# yellow extension dload

**Development discontinued.**

Version 0.5.2

> Tested with Version 0.8.33 / Release 0.8.16 of Yellow

## Application

»dload« creates a div with defered loading of a file of the *current* website.

Loading of a page can be massively delayed for expample containing two [Ticker](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/ticker). For fast loading of the landing page (and others) `dload` starts the including of the adressed page after the page itself has been loaded.

## Install

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [dload extension](https://github.com/BsNoSi/yellow-extension-dload/archive/master.zip).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-dload-master.zip` into the `system/plugins` folder.

To uninstall simply delete the [extension files](update.ini).

> Previous version of dload used `dload.js` (`system/extensions`) that is obsolete now.

## Usage

     [dload  "file" "class" "note"]
     
| Parameter | Function |
| :---: | :--- |     
| file | *required*: The file to load into the created `<div>`.<br/>You have to adress the full *relative* path to the file. |
| class | *optional*: If you like to address the area with a `.format` from your css. |
| note | *optional*: Passes the `note` as a temporary information to the page *as html*. |


## You have to add `dload: …` to the file description:

```.md
---
title:
…
dload: …  ← value does not matter, the entry as such is required
…
---
```
This suppresses useless load of the script on pages without `dload`.

## Restrictions

- This solution supports ony one `dload` entry per page. 
- A `dload` in a defered loaded page creates only the `note`.


## Examples

	[dload "../about/blogpages"]

Defered loading of `content/3-about/blognews.md` that may contains a ticker from an external page, that takes time to be loaded, like this:

```.md
---
Title: News
titleslug: blognews
Layout: ticker
Status: unlisted
---

--- 
### Heading


[ticker https://domain.tld/feed/page:feed.xml 3 ticker]

---

```
The file is loaded "as is". If the layout contains `header` and `footer` areas they are shown.



     [dload "../about/blognews"  news "<span class="blink"><b>Retrieving latest news …</b></span> <sub>No Javascript? Please <a href="/about/blognewsfull">click here</a>!<sub>"]


Together with some additional css in your theme file

```.css
.Blink { animation: blinker 1s cubic-bezier(.5, 0, 1, 1) infinite alternate; }
@keyframes blinker {from { opacity: 1; }  to { opacity: 0; }}
```

this creates a blinking entry that is substituted by the addressed file content. Additionally, if the user has disabled Javascript, there is a possibility to load the news manually. Be aware that the *relative path* as file location differs possibly slightly from links. The example calls a different page, if no Javascript is available, that has a layout with header and footer.

## History

2020-11-21: Alignment to install changes

2020-10-17: API changes applied.

2020-10-14: Redesign of concept

2019-12-12: Initial release, as a result of some investigations (see [Datenstrom Yellow Form](https://github.com/datenstrom/yellow/issues/469)).

## Developer

[Norbert Simon](https://nosi.de)
