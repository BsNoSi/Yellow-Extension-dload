# yellow extension dload

### V 0.0.5 (Requires YELLOW 0.8.4 or higher)

»dload« creates a div with defered loading of an adressed file.

## The Idea Behind

Loading of my homepage was massively delayed because I show there two [Ticker](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/ticker). For fast loading of the landing page (and others) »dload« starts loading *all* parts of the page created with it, after page itself has loaded.

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [dload extension](https://github.com/BsNoSi/yellow-extension-dload/archive/master.zip).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-dload-master.zip` into the `system/plugins` folder.

To uninstall simply delete the [extension files](update.ini).

## How do I use dload extension?

Create a `[dload  "file" "id" "note"]` shortcut.

The arguments

**file**, *required* : the file to load into the created `<div>`

**id**, *optional*: If you like to address the area with a `#format` from your css

**note**, *optional*: Passes the `note` as a temporary information to the page

## Examples

Minimum: `[dload "../file/"]`

Result:

~~~html
<div  w3-include-html="/file/"></div>
~~~

All options: `[dload "../file/" news " "<b>Acquiring information …</b>]`

Result:

~~~
<div  id="news" w3-include-html="/ticker/"><b>Acquiring information …</b></div>
~~~

## Background Information

»dload« uses a [script from w3schools](https://www.w3schools.com/howto/howto_html_include.asp) that is only loaded on pages where »dload« is used. To achieve this, the raw file is scanned after `dload` in the code. To speed up this process, you may add in the title area something like `dload: yes`, that cancels search imediately.

If you want to avoid this search you can uncomment ` // if ($name == "footer" && $page->isExisting("dload"))  {` and comment the following line. In this case you *have to insert* something like `dload: …` in the header area of the file, to get it work.

## History

2019-12-12: 

Initial release, as a result of some investigations (see [Datenstrom Yellow Form](https://github.com/datenstrom/yellow/issues/469)).

## Developer

[Norbert Simon](https://nosi.de)
