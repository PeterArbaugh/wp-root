# NYU WP Root Theme
The WP Root theme is designed for small amounts of content.  For the styles to work with content correctly, additional classes are required.
##Grid
All content on the root site follows a simple two-column system, or is centered.  As such, all content needs to be given assigned a class through the text editor.
| Alignment     | Class         |
| ------------- |:-------------:|
| right         | r-c           |
| left          | l-c           |
| center        | c-c           |
## Examples
### Text
Text should be brief and always assigned to a column using a class in the text editor.  For example:
```html
<div class="r-c">
<p class="p1">All text has a width of 37.5vw on desktop and is either in the right column, left column, or centered. Text centered on the page should also have centered alignment and be separated from text in the left or right column by a horizontal line or images.</p>
</div>
<div class="l-c">
<p class="p1">All text has a width of 37.5vw on desktop and is either in the right column, left column, or centered. Text centered on the page should also have centered alignment and be separated from text in the left or right column by a horizontal line or images.</p>
</div>
```
This also works with lists and blockquotes.
```html
<div class="c-c">
<ul class="ul1">
 	<li class="li1">Unordered list item 1</li>
 	<li class="li1">Unordered list item 2</li>
 	<li class="li1">Unordered list item 3</li>
 	<li class="li1">Unordered list item 4</li>
 	<li class="li1">Unordered list item 5</li>
 	<li class="li1">Unordered list item that is very long and wraps to the next line.</li>
</ul>
<blockquote>
<p class="p1">All different variants of block quote have a<span class="Apple-converted-space">  </span>left border and 20px of left padding.</p>
</blockquote>
</div>
```
### Images & Embeds
Images and embeds fall under a similar set of rules when creating content, but currently have an additional class to allow for centered, full-width images. 
| Alignment     | Class         |
| ------------- |:-------------:|
| right         | r-c           |
| left          | l-c           |
| center        | c-c           |
| center, full width| c-i       |
```html
<div class="r-c">
[caption id="attachment_20" align="alignnone" width="6000"]<img class="wp-image-20 size-full" src="http://localhost:8888/wpthemedev/wp-content/uploads/2018/05/andrew-neel-609846-unsplash.jpg" alt="" width="6000" height="4000" /> This is an image caption. The caption is the same font size as the normal paragraph, only italicized. The caption adheres to the columns.[/caption]
</div>
```

### Content Blocks
There are two types of content block: static and link.  Each block comes in two sizes: tall and short.  Blocks can be aligned to the right or left column. Blocks are designed to contain a header and paragraph element.  Mix and match one class from each column below to create a block. 
 Type | Size | Alignment
---|---|---
```static``` | ```block-tall``` | ``` right```
```link``` | ```block-short``` | ``` left```

For example:
```html
<div class="block-tall left static">
<h3>Tall static</h3>
<p>Tall static blocks start with an h2 and are not clickable.Descriptive text included in a paragraph.An image can be included.No change in styles on hover.Default height is 800 px for desktop.</p>
</div>

<div class="block-short right static">
<h3>Short static</h3>
<p>Tall static blocks start with an h2 and are not clickable.Descriptive text included in a paragraph.An image can be included.No change in styles on hover.Default height is 800 px for desktop.</p>
</div>
```

## Sample content
Copy and paste the following content into the text editor on a site with the theme enabled to see the different styles in action.
```html
<h2>Text styles</h2>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
<div class="l-c">
<p class="p1">Paragraph.<span class="Apple-converted-space">  </span>Montserrat is the only font used in this concept.<span class="Apple-converted-space">  </span>The design makes use of Montserrat regular, bold, and italic.</p>
<p class="p1">All text has a width of 600 px on desktop and is either in the right column, left column, or centered.<span class="Apple-converted-space">  </span>Text centered on the page should also have centered alignment and be separated from text in the left or right column by a horizontal line or images.</p>

</div>
<div class="r-c">
<p class="p1">Paragraph.<span class="Apple-converted-space">  </span>Montserrat is the only font used in this concept.<span class="Apple-converted-space">  </span>The design makes use of Montserrat regular, bold, and italic.</p>
<p class="p1">All text has a width of 600 px on desktop and is either in the right column, left column, or centered.<span class="Apple-converted-space">  </span>Text centered on the page should also have centered alignment and be separated from text in the left or right column by a horizontal line or images.</p>

</div>

<hr />

<div class="c-c">
<p class="p1">Nunc vulputate elementum urna vel pharetra. Etiam velit urna, tincidunt quis nisi a, porta convallis felis. Maecenas rutrum nisi et pellentesque sagittis.</p>

</div>

<hr />

<div class="l-c">
<ul class="ul1">
 	<li class="li1">Unordered list item 1</li>
 	<li class="li1">Unordered list item 2</li>
 	<li class="li1">Unordered list item 3</li>
 	<li class="li1">Unordered list item 4</li>
 	<li class="li1">Unordered list item 5</li>
 	<li class="li1">Unordered list item that is very long and wraps to the next line.</li>
</ul>
<blockquote>
<p class="p1">All different variants of block quote have a<span class="Apple-converted-space">  </span>left border and 20px of left padding.</p>
</blockquote>
</div>
<div class="r-c">
<ol class="ol1">
 	<li class="li1">ordered list item 1</li>
 	<li class="li1">ordered list item 2</li>
 	<li class="li1">ordered list item 3</li>
 	<li class="li1">ordered list item 4</li>
 	<li class="li1">ordered list item 5</li>
 	<li class="li1">ordered list item that is very long and wraps to the next line.</li>
</ol>
<blockquote>All different variants of block quote have a<span class="Apple-converted-space">  </span>left border and 20px of left padding.</blockquote>
</div>

<hr />

<div class="c-c">
<blockquote>All different variants of block quote have a<span class="Apple-converted-space">  </span>left border and 20px of left padding.</blockquote>
</div>

<hr />

<div class="c-c">
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
<p class="p1">Nunc vulputate elementum urna vel pharetra. Etiam velit urna, tincidunt quis nisi a, porta convallis felis. Maecenas rutrum nisi et pellentesque sagittis.</p>

</div>

<hr />

<div class="l-c">
<p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#">Unclicked Link.</a> Let aliquam velit. Mauris rhoncus sem non risus aliquet tincidunt. Mauris consequat varius velit, ac sodales diam efficitur vitae. <a href="#">Unclicked Link.</a> Praesent et lacinia erat, tincidunt facilisis elit.</p>

</div>

<hr />

<h2>Images &amp; Video</h2>
<div class="c-i">

[caption id="attachment_20" align="alignnone" width="6000"]<img class="wp-image-20 size-full" src="http://localhost:8888/wpthemedev/wp-content/uploads/2018/05/andrew-neel-609846-unsplash.jpg" alt="" width="6000" height="4000" /> This is an image caption. The caption is the same font size as the normal paragraph, only italicized. The caption adheres to the columns.[/caption]

</div>
&nbsp;
<div class="l-c">

[caption id="attachment_19" align="alignnone" width="4956"]<img class="wp-image-19 size-full" src="http://localhost:8888/wpthemedev/wp-content/uploads/2018/05/brooke-cagle-609879-unsplash.jpg" alt="" width="4956" height="3304" /> This is an image caption. The caption is the same font size as the normal paragraph, only italicized. The caption adheres to the columns.[/caption]

</div>
<div class="r-c">

[caption id="attachment_20" align="alignnone" width="6000"]<img class="wp-image-20 size-full" src="http://localhost:8888/wpthemedev/wp-content/uploads/2018/05/andrew-neel-609846-unsplash.jpg" alt="" width="6000" height="4000" /> This is an image caption. The caption is the same font size as the normal paragraph, only italicized. The caption adheres to the columns.[/caption]

</div>

<hr />

<h2>Block types</h2>
<div class="block-tall left static">
<h3>Tall static</h3>
<p class="p1">Tall static blocks start with an h2 and are not clickable.<span class="Apple-converted-space">  </span>Descriptive text included in a paragraph.<span class="Apple-converted-space">  </span>An image can be included.<span class="Apple-converted-space">  </span>No change in styles on hover.<span class="Apple-converted-space">  </span>Default height is 800 px for desktop.</p>

</div>
<div class="block-short right static">
<h3>Short static</h3>
<p class="p1">Short static blocks start with an h2 and are not clickable.<span class="Apple-converted-space">  </span>Descriptive text included in a paragraph.<span class="Apple-converted-space">  </span>An image can be included.<span class="Apple-converted-space">  </span>No change in styles on hover.<span class="Apple-converted-space">  </span>Default height is 400 px for desktop.</p>

</div>
&nbsp;
<div class="block-tall right link">
<h3>Tall link</h3>
<p class="p1">Tall static blocks start with an h2 and are not clickable.<span class="Apple-converted-space">  </span>Descriptive text included in a paragraph.<span class="Apple-converted-space">  </span>An image can be included.<span class="Apple-converted-space">  </span>No change in styles on hover.<span class="Apple-converted-space">  </span>Default height is 800 px for desktop.</p>

</div>
<div class="block-short left link">
<h3>Short link</h3>
<p class="p1">Short static blocks start with an h2 and are not clickable.<span class="Apple-converted-space">  </span>Descriptive text included in a paragraph.<span class="Apple-converted-space">  </span>An image can be included.<span class="Apple-converted-space">  </span>No change in styles on hover.<span class="Apple-converted-space">  </span>Default height is 400 px for desktop.</p>

</div>
```
