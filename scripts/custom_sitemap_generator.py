from bs4 import BeautifulSoup
import requests
import json

BASE_URL = "https://minepaper.net"
CDN_URL = "https://cdn.minepaper.net"


def main():

    output = []
    urls = crawl_site("/")

    output.append("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
    output.append("<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"")
    output.append("\txmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\">")

    for url in urls:
        output.append("\t<url>")
        output.append(f"\t\t<loc>{BASE_URL + url}</loc>")

        if url == "/gallery.php":
            image_urls = return_images_in_s3_bucket()
            for image_url in image_urls:
                output.append("\t\t<image:image>")
                output.append(f"\t\t\t<loc>{image_url}</loc>")
                output.append("\t\t</image:image>")

        elif url != "/" and url != "/index.php":
            image_urls = return_image_links_on_page(url)
            for image_url in image_urls:
                output.append("\t\t<image:image>")
                output.append(f"\t\t\t<loc>{image_url}</loc>")
                output.append("\t\t</image:image>")

        output.append("\t</url>")

    output.append("</urlset>")

    for line in output:
        print(line)


def crawl_site(url, output=[]):

    if url not in output:
        output.append(url)
    else:
        return output

    links_on_current_page = return_list_of_links_on_page(url)
    for link_on_page in links_on_current_page:
        links_on_crawled_page = crawl_site(link_on_page, output)
        for link_on_crawled_page in links_on_crawled_page:
            if link_on_crawled_page not in output:
                output.append(link_on_crawled_page)

    return output


def return_list_of_links_on_page(url):

    page = requests.get(BASE_URL + url)
    soup = BeautifulSoup(page.content, "html.parser")
    elements = soup.findAll("a")
    output = []
    for element in elements:
        if "href" in element.attrs:
            attribute = element.attrs["href"]
            if attribute.startswith("/"):
                output.append(attribute)

    return output


def return_image_links_on_page(url):

    page = requests.get(BASE_URL + url)
    soup = BeautifulSoup(page.content, "html.parser")
    elements = soup.findAll("img")
    output = []
    for element in elements:
        if "src" in element.attrs:
            output.append(element.attrs["src"])

    return output


def return_images_in_s3_bucket():

    images_json_string = str(requests.get(f"{CDN_URL}/allFiles.json").content, encoding='utf-8')
    images_json = json.loads(images_json_string)
    output = []

    for image in images_json["files"]:
        output.append(f"{CDN_URL}/" + image)
    return output


main()
