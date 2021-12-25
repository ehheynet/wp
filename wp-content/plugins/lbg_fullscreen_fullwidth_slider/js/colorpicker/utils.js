/**
 *
 * Utilities
 * Author: Stefan Petre www.eyecon.ro
 *
 */
 (function(d){EYE.extend({getPosition:function(a,b){var c=a.style,g=!1;if(b&&"none"==jQuery.curCSS(a,"display")){var e=c.visibility,d=c.position;g=!0;c.visibility="hidden";c.display="block";c.position="absolute"}var f=a;if(f.getBoundingClientRect){var h=f.getBoundingClientRect();var l=h.left+Math.max(document.documentElement.scrollLeft,document.body.scrollLeft)-2;h=h.top+Math.max(document.documentElement.scrollTop,document.body.scrollTop)-2}else{l=f.offsetLeft;h=f.offsetTop;f=f.offsetParent;if(a!=
 f)for(;f;)l+=f.offsetLeft,h+=f.offsetTop,f=f.offsetParent;jQuery.browser.safari&&"absolute"==jQuery.curCSS(a,"position")&&(l-=document.body.offsetLeft,h-=document.body.offsetTop);for(f=a.parentNode;f&&"BODY"!=f.tagName.toUpperCase()&&"HTML"!=f.tagName.toUpperCase();)"inline"!=jQuery.curCSS(f,"display")&&(l-=f.scrollLeft,h-=f.scrollTop),f=f.parentNode}1==g&&(c.display="none",c.position=d,c.visibility=e);return{x:l,y:h}},getSize:function(a){var b=parseInt(jQuery.curCSS(a,"width"),10),c=parseInt(jQuery.curCSS(a,
 "height"),10);if("none"!=jQuery.curCSS(a,"display")){var g=a.offsetWidth;a=a.offsetHeight}else{var e=a.style,d=e.visibility,f=e.position;e.visibility="hidden";e.display="block";e.position="absolute";g=a.offsetWidth;a=a.offsetHeight;e.display="none";e.position=f;e.visibility=d}return{w:b,h:c,wb:g,hb:a}},getClient:function(a){if(a){var b=a.clientWidth;a=a.clientHeight}else a=document.documentElement,b=window.innerWidth||self.innerWidth||a&&a.clientWidth||document.body.clientWidth,a=window.innerHeight||
 self.innerHeight||a&&a.clientHeight||document.body.clientHeight;return{w:b,h:a}},getScroll:function(a){var b=0,c=0,g=0,e=0,d=0,f=0;a&&"body"!=a.nodeName.toLowerCase()?(b=a.scrollTop,c=a.scrollLeft,g=a.scrollWidth,e=a.scrollHeight):(document.documentElement?(b=document.documentElement.scrollTop,c=document.documentElement.scrollLeft,g=document.documentElement.scrollWidth,e=document.documentElement.scrollHeight):document.body&&(b=document.body.scrollTop,c=document.body.scrollLeft,g=document.body.scrollWidth,
 e=document.body.scrollHeight),"undefined"!=typeof pageYOffset&&(b=pageYOffset,c=pageXOffset),d=self.innerWidth||document.documentElement.clientWidth||document.body.clientWidth||0,f=self.innerHeight||document.documentElement.clientHeight||document.body.clientHeight||0);return{t:b,l:c,w:g,h:e,iw:d,ih:f}},getMargins:function(a,b){var c=jQuery.curCSS(a,"marginTop")||"",g=jQuery.curCSS(a,"marginRight")||"",e=jQuery.curCSS(a,"marginBottom")||"",d=jQuery.curCSS(a,"marginLeft")||"";return b?{t:parseInt(c,
 10)||0,r:parseInt(g,10)||0,b:parseInt(e,10)||0,l:parseInt(d,10)}:{t:c,r:g,b:e,l:d}},getPadding:function(a,b){var c=jQuery.curCSS(a,"paddingTop")||"",d=jQuery.curCSS(a,"paddingRight")||"",e=jQuery.curCSS(a,"paddingBottom")||"",k=jQuery.curCSS(a,"paddingLeft")||"";return b?{t:parseInt(c,10)||0,r:parseInt(d,10)||0,b:parseInt(e,10)||0,l:parseInt(k,10)}:{t:c,r:d,b:e,l:k}},getBorder:function(a,b){var c=jQuery.curCSS(a,"borderTopWidth")||"",d=jQuery.curCSS(a,"borderRightWidth")||"",e=jQuery.curCSS(a,"borderBottomWidth")||
 "",k=jQuery.curCSS(a,"borderLeftWidth")||"";return b?{t:parseInt(c,10)||0,r:parseInt(d,10)||0,b:parseInt(e,10)||0,l:parseInt(k,10)||0}:{t:c,r:d,b:e,l:k}},traverseDOM:function(a,b){b(a);for(a=a.firstChild;a;)EYE.traverseDOM(a,b),a=a.nextSibling},getInnerWidth:function(a,b){var c=a.offsetWidth;return b?Math.max(a.scrollWidth,c)-c+a.clientWidth:a.clientWidth},getInnerHeight:function(a,b){var c=a.offsetHeight;return b?Math.max(a.scrollHeight,c)-c+a.clientHeight:a.clientHeight},getExtraWidth:function(a){return d.boxModel?
 (parseInt(d.curCSS(a,"paddingLeft"))||0)+(parseInt(d.curCSS(a,"paddingRight"))||0)+(parseInt(d.curCSS(a,"borderLeftWidth"))||0)+(parseInt(d.curCSS(a,"borderRightWidth"))||0):0},getExtraHeight:function(a){return d.boxModel?(parseInt(d.curCSS(a,"paddingTop"))||0)+(parseInt(d.curCSS(a,"paddingBottom"))||0)+(parseInt(d.curCSS(a,"borderTopWidth"))||0)+(parseInt(d.curCSS(a,"borderBottomWidth"))||0):0},isChildOf:function(a,b,c){if(a==b)return!0;if(!b||!b.nodeType||1!=b.nodeType)return!1;if(a.contains&&!d.browser.safari)return a.contains(b);
 if(a.compareDocumentPosition)return!!(a.compareDocumentPosition(b)&16);for(b=b.parentNode;b&&b!=c;){if(b==a)return!0;b=b.parentNode}return!1},centerEl:function(a,b){var c=EYE.getScroll(),g=EYE.getSize(a);b&&"vertically"!=b||d(a).css({top:c.t+(Math.min(c.h,c.ih)-g.hb)/2+"px"});b&&"horizontally"!=b||d(a).css({left:c.l+(Math.min(c.w,c.iw)-g.wb)/2+"px"})}});d.easing.easeout||(d.easing.easeout=function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c})})(jQuery);