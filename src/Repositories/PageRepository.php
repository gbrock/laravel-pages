<?php namespace Gbrock\Pages\Repositories;

class PageRepository {
    public function renderTemplate($value)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($value);

        if($divs = $dom->getElementsByTagName('div'))
        {
            foreach($divs as $d)
            {
                if($d->hasAttribute('chunk'))
                {
                    $chunk = $d->getAttribute('chunk');
                    $d->removeAttribute('chunk');

                    // Remove everything from this chunk.
                    while ($d->hasChildNodes()) {
                        $d->removeChild($d->firstChild);
                    }

                    // Add a single variable defining how to insert into this chunk
                    $variable = '|#|' . $chunk . '|/#|';
                    $d->appendChild($dom->createTextNode($variable));
                }
            }
        }

       return $this->DOMInnerHTML($dom->getElementsByTagName("body")[0]);
    }

    protected function DOMInnerHTML($element)
    {
        $innerHTML = "";
        $children  = $element->childNodes;

        foreach ($children as $child)
        {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }
}
