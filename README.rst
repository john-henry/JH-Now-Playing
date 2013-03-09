=JH Now Playing Add-on =

==Requirements==

* ExpressionEngine 2.1 or later
* PHP 5
* This add-on requires the [[http://brandon.fuller.name/archives/hacks/nowplaying/|Now Playing iTunes Visualizer]] by Brandon Fuller.


== Installation Instructions==

# Upload **jh_now_playing ** folder and it's contents to //system/expressionengine/third_party///
# Install the extension in Add-Ons → Extensions
# Ensure that Extensions are enabled in Add-Ons → Extensions


		
== Template Tags and Parameters ==

===Primary Tag Pair===	

{{{
#!html

{exp:jh_now_playing limit="3"}
 <a href="{urlAmazon}"><img src="{artworkID}" alt="{album}" /></a>
    <p>
      <strong>{artist}</strong><br />{title}
    </p>
{/exp:jh_now_playing}
}}}

===Tag Parameters===
The following parameters can be added to each of Now Playing's tags:

|=Parameter Name |=Description        |
|**limit**       |//limit the number of songs returned// |

===Single Variable Tags===
The following single variables are available within your tag pair:	

|=Variable Name |=Description        |
|**{title}**       |//song title// |
|**{artist} **      |//artist name//              |
|**{album}**       |//album name// |
|**{genre}**       |//genre// |
|**{kind}**       |//audio file type (AAC, MP3, etc.)// |
|**{track}**       |//track number// |
|**{numTracks}**       |//total album tracks// |
|**{year}**       |//year published// |
|**{comments}**       |//iTunes user comments// |
|**{time}**       |//time, in seconds// |
|**{bitrate}**       |//audio file bitrate// |
|**{rating}**       |//iTunes rating// |
|**{disc}**       |//disk number// |
|**{numDiscs}**       |//number of disks// |
|**{playCount}**       |//playcount// |
|**{compilation}**       |//compilation// |
|**{urlAmazon}**       |//address to album on Amazon, if available// |
|**{urlApple}**       |//address to album on Apple, if available// |
|**{compilation}**       |//compilation// |
|**{imageSmall}**       |//address to small image on Amazon// |
|**{image}**       |//address to medium image on Amazon// |
|**{imageLarge}**       |//address to large image on Amazon// |
|**{composer}**       |//composer// |
|**{urlSource}**       |//URL source// |
|**{file}**       |//filename// |
|**{artworkID}**       |//address to uploaded artwork// |
