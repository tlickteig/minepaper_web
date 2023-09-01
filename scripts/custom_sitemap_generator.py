from bs4 import BeautifulSoup
import requests

BASE_URL = "https://minepaper.net"


def main():

    print("sdfsdf")
    urls = crawl_site("/")
    for url in urls:
        print(url)


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


main()
