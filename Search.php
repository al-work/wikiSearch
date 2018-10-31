<?php

class Search
{
    public function getSearchResult($text)
    {
        $serchResult = $this->wikiSearch($text);
        if ($serchResult) {
            $resultHtml = $this->createHtml($serchResult);
            echo $resultHtml;
        } else {
            echo false;
        }
    }

    /**
     * processing the data and creating html
     */
    public function createHtml($searchResult)
    {

        $html = '<ul class="list-unstyled">';
        foreach ($searchResult as $item) {
            $html .= '<li class="media my-4">';
            if (isset($item->thumbnail)) {
                $html .= '<img class="mr-3" src="' . $item->thumbnail->source . '" alt="Generic placeholder image">';
            }

            $html .= '<div class="media-body">';
            $html .= '<a target="_blank" href="https://en.wikipedia.org/?curid=' . $item->pageid . '"><h5 class="mt-0 mb-1">' . $item->title . '</h5></a>';
            $html .= $item->extract;
            $html .= '</div>';
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    /**
     * getting data from Wikipedia Api
     */
    public function wikiSearch($text)
    {
        $responsFromWiki = file_get_contents('https://en.wikipedia.org/w/api.php?format=json&action=query&generator=search&gsrnamespace=0&gsrlimit=10&prop=pageimages|extracts&pilimit=max&exintro&explaintext&exsentences=1&exlimit=max&gsrsearch=' . $text);
        $obj = json_decode($responsFromWiki);
        if (isset($obj->query->pages)) {
            return $obj->query->pages;
        } else {
            return false;
        }

    }
}
