import{c as xe,g as Ie}from"./apexcharts.js";var fe={exports:{}};/*!
  * vue-scrollto v2.20.0
  * (c) 2019 Randjelovic Igor
  * @license MIT
  */(function(le,Ce){(function(O,E){le.exports=E()})(xe,function(){function O(r){"@babel/helpers - typeof";return typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?O=function(e){return typeof e}:O=function(e){return e&&typeof Symbol=="function"&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},O(r)}function E(){return E=Object.assign||function(r){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var t in n)Object.prototype.hasOwnProperty.call(n,t)&&(r[t]=n[t])}return r},E.apply(this,arguments)}var se=4,ce=.001,ve=1e-7,pe=10,L=11,I=1/(L-1),de=typeof Float32Array=="function";function $(r,e){return 1-3*e+3*r}function j(r,e){return 3*e-6*r}function q(r){return 3*r}function N(r,e,n){return(($(e,n)*r+j(e,n))*r+q(e))*r}function U(r,e,n){return 3*$(e,n)*r*r+2*j(e,n)*r+q(e)}function ge(r,e,n,t,i){var u,a,w=0;do a=e+(n-e)/2,u=N(a,t,i)-r,u>0?n=a:e=a;while(Math.abs(u)>ve&&++w<pe);return a}function ye(r,e,n,t){for(var i=0;i<se;++i){var u=U(e,n,t);if(u===0)return e;var a=N(e,n,t)-r;e-=a/u}return e}function be(r){return r}var W=function(e,n,t,i){if(!(0<=e&&e<=1&&0<=t&&t<=1))throw new Error("bezier x values must be in [0, 1] range");if(e===n&&t===i)return be;for(var u=de?new Float32Array(L):new Array(L),a=0;a<L;++a)u[a]=N(a*I,e,t);function w(g){for(var v=0,s=1,T=L-1;s!==T&&u[s]<=g;++s)v+=I;--s;var S=(g-u[s])/(u[s+1]-u[s]),y=v+S*I,h=U(y,e,t);return h>=ce?ye(g,y,e,t):h===0?y:ge(g,v,v+I,e,t)}return function(v){return v===0?0:v===1?1:N(w(v),n,i)}},Y={ease:[.25,.1,.25,1],linear:[0,0,1,1],"ease-in":[.42,0,1,1],"ease-out":[0,0,.58,1],"ease-in-out":[.42,0,.58,1]},J=!1;try{var me=Object.defineProperty({},"passive",{get:function(){J=!0}});window.addEventListener("test",null,me)}catch{}var p={$:function(e){return typeof e!="string"?e:document.querySelector(e)},on:function(e,n,t){var i=arguments.length>3&&arguments[3]!==void 0?arguments[3]:{passive:!1};n instanceof Array||(n=[n]);for(var u=0;u<n.length;u++)e.addEventListener(n[u],t,J?i:!1)},off:function(e,n,t){n instanceof Array||(n=[n]);for(var i=0;i<n.length;i++)e.removeEventListener(n[i],t)},cumulativeOffset:function(e){var n=0,t=0;do n+=e.offsetTop||0,t+=e.offsetLeft||0,e=e.offsetParent;while(e);return{top:n,left:t}}},K=["mousedown","wheel","DOMMouseScroll","mousewheel","keyup","touchmove"],c={container:"body",duration:500,lazy:!0,easing:"ease",offset:0,force:!0,cancelable:!0,onStart:!1,onDone:!1,onCancel:!1,x:!1,y:!0};function Q(r){c=E({},c,r)}var Z=function(){var e,n,t,i,u,a,w,g,v,s,T,S,y,h,V,C,P,A,B,b,M,k,H,ee=function(f){g&&(H=f,b=!0)},ne,z,R,x;function he(l){var f=l.scrollTop;return l.tagName.toLowerCase()==="body"&&(f=f||document.documentElement.scrollTop),f}function Oe(l){var f=l.scrollLeft;return l.tagName.toLowerCase()==="body"&&(f=f||document.documentElement.scrollLeft),f}function re(){M=p.cumulativeOffset(n),k=p.cumulativeOffset(e),S&&(V=k.left-M.left+a,A=V-h),y&&(P=k.top-M.top+a,B=P-C)}function te(l){if(b)return oe();z||(z=l),u||re(),R=l-z,x=Math.min(R/t,1),x=ne(x),ae(n,C+B*x,h+A*x),R<t?window.requestAnimationFrame(te):oe()}function oe(){b||ae(n,P,V),z=!1,p.off(n,K,ee),b&&T&&T(H,e),!b&&s&&s(e)}function ae(l,f,o){y&&(l.scrollTop=f),S&&(l.scrollLeft=o),l.tagName.toLowerCase()==="body"&&(y&&(document.documentElement.scrollTop=f),S&&(document.documentElement.scrollLeft=o))}function Ee(l,f){var o=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};if(O(f)==="object"?o=f:typeof f=="number"&&(o.duration=f),e=p.$(l),!e)return console.warn("[vue-scrollto warn]: Trying to scroll to an element that is not on the page: "+l);if(n=p.$(o.container||c.container),t=o.hasOwnProperty("duration")?o.duration:c.duration,u=o.hasOwnProperty("lazy")?o.lazy:c.lazy,i=o.easing||c.easing,a=o.hasOwnProperty("offset")?o.offset:c.offset,w=o.hasOwnProperty("force")?o.force!==!1:c.force,g=o.hasOwnProperty("cancelable")?o.cancelable!==!1:c.cancelable,v=o.onStart||c.onStart,s=o.onDone||c.onDone,T=o.onCancel||c.onCancel,S=o.x===void 0?c.x:o.x,y=o.y===void 0?c.y:o.y,typeof a=="function"&&(a=a(e,n)),h=Oe(n),C=he(n),re(),b=!1,!w){var Le=n.tagName.toLowerCase()==="body"?document.documentElement.clientHeight||window.innerHeight:n.offsetHeight,ie=C,_e=ie+Le,ue=P-a,Te=ue+e.offsetHeight;if(ue>=ie&&Te<=_e){s&&s(e);return}}if(v&&v(e),!B&&!A){s&&s(e);return}return typeof i=="string"&&(i=Y[i]||Y.ease),ne=W.apply(W,i),p.on(n,K,ee,{passive:!0}),window.requestAnimationFrame(te),function(){H=null,b=!0}}return Ee},D=Z(),d=[];function we(r){for(var e=0;e<d.length;++e)if(d[e].el===r)return d.splice(e,1),!0;return!1}function Se(r){for(var e=0;e<d.length;++e)if(d[e].el===r)return d[e]}function F(r){var e=Se(r);return e||(d.push(e={el:r,binding:{}}),e)}function G(r){var e=F(this).binding;if(e.value){if(r.preventDefault(),typeof e.value=="string")return D(e.value);D(e.value.el||e.value.element,e.value)}}var m={bind:function(e,n){F(e).binding=n,p.on(e,"click",G)},unbind:function(e){we(e),p.off(e,"click",G)},update:function(e,n){F(e).binding=n}},_={bind:m.bind,unbind:m.unbind,update:m.update,beforeMount:m.bind,unmounted:m.unbind,updated:m.update,scrollTo:D,bindings:d},X=function(e,n){n&&Q(n),e.directive("scroll-to",_);var t=e.config.globalProperties||e.prototype;t.$scrollTo=_.scrollTo};return typeof window<"u"&&window.Vue&&(window.VueScrollTo=_,window.VueScrollTo.setDefaults=Q,window.VueScrollTo.scroller=Z,window.Vue.use&&window.Vue.use(X)),_.install=X,_})})(fe);var Ne=fe.exports;const ze=Ie(Ne);export{ze as V};