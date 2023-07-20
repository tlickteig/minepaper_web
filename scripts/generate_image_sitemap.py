import os

DOWNLOAD_DIRECTORY = "C:\\Repos\\minepaper_web\\src\\wallpapers"
WALLPAPERS_PATH = "https://minepaper.net/wallpapers"


def main():

    image_list = return_list_of_images_in_directory()
    output_lines = []

    for image in image_list:
        output_lines.append("<url>")
        output_lines.append("\t<image:image>")
        output_lines.append(f"\t\t<image:loc>{WALLPAPERS_PATH}/{image}</image:loc>")
        output_lines.append("\t</image:image>")
        output_lines.append("</url>")

    for line in output_lines:
        print(line)


def return_list_of_images_in_directory():

    output = []
    for item in os.listdir(DOWNLOAD_DIRECTORY):
        output.append(item)

    return output


main()
