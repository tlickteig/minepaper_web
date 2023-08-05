import os
import requests
import json

DOWNLOAD_DIRECTORY = "C:\\Repos\\minepaper_web\\src\\wallpapers"
WALLPAPERS_PATH = "https://cdn.minepaper.net"
WALLPAPER_LIST_PATH = "https://cdn.minepaper.net/allFiles.json"


def main():

    image_list = return_list_of_images_in_directory()
    output_lines = []

    for image in image_list:
        output_lines.append("<image:image>")
        output_lines.append(f"\t<image:loc>{WALLPAPERS_PATH}/{image}</image:loc>")
        output_lines.append("</image:image>")

    for line in output_lines:
        print(line)


def return_list_of_images_in_directory():

    r = requests.get(WALLPAPER_LIST_PATH)
    return_text = r.text
    results = json.loads(return_text)
    return results["files"]


main()
