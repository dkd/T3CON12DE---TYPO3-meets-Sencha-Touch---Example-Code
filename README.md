T3CON12DE - TYPO3 meets Sencha Touch - Example Code
===================================================

Example code of my T3CON12DE TYPO3 Conference Stuttgart talk.

**Title:** TYPO3 meets Sencha Touch

**Description:**
How to build mobile web applications with the JavaScript Framework Sencha Touch and feed it with content from TYPO3.
After a introduction to Sencha Touch we will showcase some apps we builded.
On a example we will talk about how to develop Sencha Touch applications. See how we can feed the app with content from TYPO3 and use a cloud service to optimize content images for mobile devices.

**Youtube:** http://www.youtube.com/watch?v=G5guC_OT_EM

**Slides:** http://de.slideshare.net/nilsdehl/sencha-touch-meets-typ03

**Blog:** http://nils-dehl.de

# TYPO3 Pagetype configuration's

## For Content

<pre>
jsonCEsPage = PAGE
jsonCEsPage {
  typeNum = 1000
  
   config {
    additionalHeaders = Content-type:application/json
    disableAllHeaderCode = 1
    xhtml_cleaning = 0
    admPanel = 0
    debug = 0
    no_cache = 1
    tx_realurl_enable = 0
  }
  
  10 = JSON_CONTENT
  10 {
    table = tt_content
    select {
      selectFields = uid, pid, CType, header, bodytext, image
    } 
    fieldRendering {
      image {
        
        split{
          token =,
          cObjNum = 1
          1 = COA
          1 {
            5 = IMG_RESOURCE
            5{
              file{
                import.current = 1
                import = uploads/pics/

              }
            }
            wrap = http://typo3.sencha-touch.de/|,
          }
        }
      }
    }
  }
}
</pre>

## For Pages

<pre>
jsonPages &lt; jsonCEsPage
jsonPages {
  typeNum = 1001

  10 {
    table = pages
    select {
      selectFields = uid, pid, title
    } 
  }
}
</pre>
