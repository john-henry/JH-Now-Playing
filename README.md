# JH Now Playing Add-on

## Requirements

*   ExpressionEngine 2.1 or later 
*   PHP 5 
*   This add-on requires the [Now Playing iTunes Visualizer][34] by Brandon Fuller. 

## Installation Instructions

1.  Upload **jh\_now\_playing ** folder and it's contents to *system/expressionengine/third_party*/ 
2.  Install the extension in Add-Ons → Extensions 
3.  Ensure that Extensions are enabled in Add-Ons → Extensions 

## Template Tags and Parameters

### Primary Tag Pair

    {exp:jh_now_playing limit="3"}
     
        
          {artist}{title}
        
    {/exp:jh_now_playing}
    

### Tag Parameters

The following parameters can be added to each of Now Playing's tags:

<table><tr><th>Parameter Name</th><th>Description</th></tr>
<tr><td><strong>limit</strong></td><td><em>limit the number of songs returned</em></td></tr>
</table>

### Single Variable Tags

The following single variables are available within your tag pair: 

<table><tr><th>Variable Name</th><th>Description</th></tr>
<tr><td><strong>{title}</strong></td><td><em>song title</em></td></tr>
<tr><td><strong>{artist} </strong></td><td><em>artist name</em></td></tr>
<tr><td><strong>{album}</strong></td><td><em>album name</em></td></tr>
<tr><td><strong>{genre}</strong></td><td><em>genre</em></td></tr>
<tr><td><strong>{kind}</strong></td><td><em>audio file type (AAC, MP3, etc.)</em></td></tr>
<tr><td><strong>{track}</strong></td><td><em>track number</em></td></tr>
<tr><td><strong>{numTracks}</strong></td><td><em>total album tracks</em></td></tr>
<tr><td><strong>{year}</strong></td><td><em>year published</em></td></tr>
<tr><td><strong>{comments}</strong></td><td><em>iTunes user comments</em></td></tr>
<tr><td><strong>{time}</strong></td><td><em>time, in seconds</em></td></tr>
<tr><td><strong>{bitrate}</strong></td><td><em>audio file bitrate</em></td></tr>
<tr><td><strong>{rating}</strong></td><td><em>iTunes rating</em></td></tr>
<tr><td><strong>{disc}</strong></td><td><em>disk number</em></td></tr>
<tr><td><strong>{numDiscs}</strong></td><td><em>number of disks</em></td></tr>
<tr><td><strong>{playCount}</strong></td><td><em>playcount</em></td></tr>
<tr><td><strong>{compilation}</strong></td><td><em>compilation</em></td></tr>
<tr><td><strong>{urlAmazon}</strong></td><td><em>address to album on Amazon, if available</em></td></tr>
<tr><td><strong>{urlApple}</strong></td><td><em>address to album on Apple, if available</em></td></tr>
<tr><td><strong>{compilation}</strong></td><td><em>compilation</em></td></tr>
<tr><td><strong>{imageSmall}</strong></td><td><em>address to small image on Amazon</em></td></tr>
<tr><td><strong>{image}</strong></td><td><em>address to medium image on Amazon</em></td></tr>
<tr><td><strong>{imageLarge}</strong></td><td><em>address to large image on Amazon</em></td></tr>
<tr><td><strong>{composer}</strong></td><td><em>composer</em></td></tr>
<tr><td><strong>{urlSource}</strong></td><td><em>URL source</em></td></tr>
<tr><td><strong>{file}</strong></td><td><em>filename</em></td></tr>
<tr><td><strong>{artworkID}</strong></td><td><em>address to uploaded artwork</em></td></tr>
</table>