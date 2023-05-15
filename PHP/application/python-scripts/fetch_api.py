import requests
import json
import os
import cgi

api_url = "https://api.dictionaryapi.dev/api/v2/entries/en/"

payload = "Hello"
api_response = requests.get(api_url + "Hello")
response = (api_response.json())
result = (json.dumps(response, indent=4, sort_keys=True))

print(type(response))
for items in response:
    word = (items['word'])
    meaning = (items['meanings'])
    for items in meaning:
        print(items)
    """
    for stuff in meaning:
        PoS = stuff['partOfSpeech']
        defi = stuff['definitions']
        print(PoS)
        print(defi)
    """
