(()=>{var t={72:(t,e,a)=>{"use strict";a.d(e,{Z:()=>n});const n=function(t){var e=document.getElementById("wpte_price-toggle-btn-mb");if(e){var a=document.getElementById("wpte_price-toggle-btn-mb-layout-3"),n=e.closest(".wpte-booking-area"),o=n?.querySelector(".wpte-bf-price-wrap");function s(){n?.classList.remove("show"),e?.classList.remove("active")}e.onclick=function(){this.classList.toggle("active"),n?.classList.toggle("show"),o?.classList.toggle("show"),o?.style.maxHeight?o.style.maxHeight=null:o.style.maxHeight=o.scrollHeight+"px"};var r=document.getElementById("open-booking-modal");if(n&&(a&&a.addEventListener("click",(function(){s()})),r.addEventListener("click",(function(){s()}))),n.matches(".wpte-form-layout-2")&&window.matchMedia("(max-width: 1024px)").matches){var i=n.clientHeight;document.body.style.padding=`0 0 ${i}px`}}}},975:(t,e,a)=>{"use strict";a.d(e,{Z:()=>n});const n=function(t,e){if(Dropzone.autoDiscover=!1,e(document).find(".trip-review-stars").length&&e(document).find(".trip-review-stars").each((function(){var t=e(this).data("rating-value");e(this).data("icon-type"),e(this).rateYo({rating:t,starSvg:'<svg width="29" height="28" viewBox="0 0 29 28" stroke="" xmlns="http://www.w3.org/2000/svg"><path d="M13.6636 1.21895C14.0288 0.469865 15.0962 0.469863 15.4614 1.21895L19.0244 8.52811C19.169 8.82468 19.4506 9.03085 19.7769 9.07915L27.7669 10.2617C28.5829 10.3825 28.91 11.3837 28.3227 11.9629L22.527 17.6789C22.2946 17.9081 22.1887 18.2362 22.2432 18.5579L23.6086 26.6191C23.7473 27.4378 22.8855 28.059 22.1526 27.6688L15.0325 23.8773C14.7387 23.7208 14.3863 23.7208 14.0925 23.8773L6.97236 27.6688C6.23947 28.059 5.37772 27.4378 5.51639 26.6191L6.88179 18.5579C6.93629 18.2362 6.83037 17.9081 6.59803 17.6789L0.802323 11.9629C0.214999 11.3837 0.542087 10.3825 1.35811 10.2617L9.34808 9.07915C9.67445 9.03085 9.95599 8.82468 10.1006 8.52812L13.6636 1.21895Z"/></svg>'})})),e(document).find(".review-form-rating").each((function(){e(this).data("icon-type"),e(this).rateYo({starSvg:'<svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.6636 1.21895C14.0288 0.469865 15.0962 0.469863 15.4614 1.21895L19.0244 8.52811C19.169 8.82468 19.4505 9.03085 19.7769 9.07915L27.7669 10.2617C28.5829 10.3825 28.91 11.3837 28.3227 11.9629L22.527 17.6789C22.2946 17.9081 22.1887 18.2362 22.2432 18.5579L23.6086 26.6191C23.7473 27.4378 22.8855 28.059 22.1526 27.6688L15.0325 23.8773C14.7387 23.7208 14.3863 23.7208 14.0925 23.8773L6.97236 27.6688C6.23947 28.059 5.37772 27.4378 5.51639 26.6191L6.8818 18.5579C6.93629 18.2362 6.83037 17.9081 6.59803 17.6789L0.802323 11.9629C0.214999 11.3837 0.542087 10.3825 1.35811 10.2617L9.34808 9.07915C9.67445 9.03085 9.95599 8.82468 10.1006 8.52812L13.6636 1.21895Z" stroke="#EBAD34" stroke-linecap="round" stroke-linejoin="round"/></svg>',fullStar:!0,ratedFill:"#EBAD34",normalFill:"transparent",onChange:function(t,a){e(".comment-rating-field-message").hide(),""==e(this).parent().find('input[name="stars"]').val(t)||e(this).parent().find('input[name="stars"]').val(t)}})})),e("#commentform").length&&(jQuery("#commentform")[0].encoding="multipart/form-data",e(".input-review-images").length)){jQuery("#commentform").addClass("dropzone");var a=jQuery("#commentform").attr("action")}if(e(".input-review-images").length){var n=e("span.review-upload-image-text").html(),o=e("span.review-upload-image-svg").html();if(Dropzone.autoDiscover=!1,!document.querySelector("#wpte-upload-review-images").classList.contains("dz-clickable")){new Dropzone("#wpte-upload-review-images",{addRemoveLinks:!0,autoProcessQueue:!1,uploadMultiple:!0,parallelUploads:100,maxFiles:20,clickable:!0,url:a||wtetr_public_js_object.home_url,paramName:"gallery",addRemoveLinks:!0,acceptedFiles:".jpeg,.jpg,.png,.gif",dictDefaultMessage:n,init:function(){var t=this;t.on("addedFile",(function(t){})),e("#commentform input[type=submit]").click((function(a){return 0==t.files.length&&e("#commentform").valid()?"0"===e("#commentform").find(".wte-trip-review-rating").find("input[type=hidden]").val()?(goToByScroll("#commentform",10),e(".comment-rating-field-message").show(),!1):void toastr.success("Your review has been submitted for moderation","WP Travel Engine"):(a.preventDefault(),e("#commentform").valid()&&(e(".submit-after-comment-wrap").show(),t.processQueue()),!1)})),this.on("sending",(function(t,a,n){var o=e("#commentform").serializeArray();e.each(o,(function(t,e){n.append(e.name,e.value)}))}))},error:function(t,a){if(e(".submit-after-comment-wrap").hide(),"string"===e.type(a))var n=a;else n=a.message;for(t.previewElement.classList.add("dz-error"),_ref=t.previewElement.querySelectorAll("[data-dz-errormessage]"),_results=[],_i=0,_len=_ref.length;_i<_len;_i++)node=_ref[_i],_results.push(node.textContent=n);return _results},successmultiple:function(t,a){e(".submit-after-comment-wrap").hide(),window.location.reload()},completemultiple:function(t,a){toastr.success("Your review has been submitted for moderation","WP Travel Engine"),e(".submit-after-comment-wrap").hide(),window.location.reload()}});var r=e("<span>",{class:"file-upload-icon"}).prependTo(".dz-button");e(o).appendTo(r)}}e(".overall-rating-wrap").appear(),e(document.body).on("appear",".overall-rating-wrap",(function(t,e){jQuery(".rating-bar").each((function(){jQuery(this).find(".rating-bar-inner").animate({width:jQuery(this).find(".rating-bar-inner").attr("data-percent")+"%"},2e3)}))})),e("#commentform").length&&e("#commentform input[type=submit]").click((function(t){if(e("#commentform").valid()&&"0"===e("#commentform").find(".wte-trip-review-rating").find("input[type=hidden]").val())return e(".comment-rating-field-message").show(),goToByScroll("#commentform",10),!1}))}},958:(t,e,a)=>{"use strict";a.d(e,{Z:()=>n});const n=function(t,e){const a="1"==window.rtl.enable,n=document.querySelectorAll(".wpte-trip-feat-img-gallery");n&&n.forEach((t=>{const n=t.classList.contains("single-trip-main-carousel");jQuery.fn.owlCarousel&&e(t).owlCarousel({nav:!0,navigationText:["&lsaquo;","&rsaquo;"],items:1,autoplay:n,slideSpeed:300,paginationSpeed:400,center:!0,loop:!0,rtl:a,dots:!n})}))}},791:(t,e,a)=>{"use strict";a.d(e,{Z:()=>n});const n=function(t){var e=t;let a=()=>{};a.chart=null,a.chartData={},a.datalabels=t=>({labels:{name:{color:e?.data?.color??"#ff0000",align:"top",offset:36,font:{size:12},formatter:(t,e)=>Object.values(a.chartData)[e.dataIndex].at},value:{align:"top",color:e?.data?.color??"#ff0000",offset:10,font:{size:12,weight:"bold",color:"#ff0000"},padding:4,formatter:(e,a)=>`${e} ${t}`}}}),a.settings={type:"line",data:{datasets:[{label:e?.strings["data.datasets.label"],data:[],backgroundColor:[e?.data?.color+"33"??"#ff000033"],borderColor:[e?.data?.color??"#ff0000"],borderWidth:1,datalabels:a.datalabels(e?.alt_unit??"m"),fill:e?.data["datasets.data.fill"]??!0}],labels:[]},options:{showAllTooltips:!0,scales:{xAxes:[{display:e?.options["scales.xAxes.display"]??!1,scaleLabel:{display:!0,labelString:e?.strings["options.scales.xAxes.scaleLabel.labelString"]}}],yAxes:[{display:e?.options["scales.yAxes.display"]??!1,scaleLabel:{display:!0,labelString:e?.strings["options.scales.yAxes.scaleLabel.labelString"]}}]},pointLabels:{display:!0},title:{display:!1,text:e?.strings["options.title.text"]},elements:{point:{backgroundColor:e?.data?.color??"#ff0000",borderWidth:3}},layout:{padding:{left:50,right:50,top:50,bottom:0}},responsive:!0,maintainAspectRatio:!1,legend:{fontColor:e?.data?.color??"#ff0000",display:!0}},plugins:{datalabels:{color:"#36A2EB",labels:{title:{font:{weight:"bold"}},value:{color:"green"}}}}},a.update=([t,e])=>{a.settings[t]=e,a.chart.update()},a.init=(t,e=null,n={})=>{a.chartData=e??a.randomChartData(),a.settings.data.datasets[0].data=Object.values(a.chartData).map((t=>t.altitude)),a.settings.data.labels=Object.entries(a.chartData).map((([t,e])=>`Day ${t}`)),a.chart=new Chart(t,{...a.settings,...n})},a.randomize=(t="m")=>{a.chartData=a.randomChartData(t),a.settings.data.datasets[0].data=Object.values(a.chartData).map((t=>t.altitude)),a.chart.data.datasets[0].data=a.settings.data.datasets[0].data,a.chart.update()},a.randomChartData=(t="m")=>{let e={},a={m:1,ft:3.28};return[1,2,3,4,5].forEach((n=>{e={...e,[n]:{at:`Location ${n}`,altitude:Math.floor((8417*Math.random()+431)*a[t]),unit:t}}})),e};let n=document.getElementById("wteAltChart");const o=document.getElementById("altitude-chart-screen");e=t;try{if(e&&e.chartData&&e.chartData[0]){e=JSON.parse(e.chartData[0]);let t=Object.keys(e).length;o&&(o.style.width=100*t+"px")}}catch(t){console.log("Its okay if is admin settings.",t)}n&&a.init(n,e),(()=>{let t=document.querySelector(`[value=${e?.alt_unit??"m"}]`);t&&(t.checked=!0)})()}},680:(t,e,a)=>{"use strict";a.d(e,{Z:()=>n});const n=function(t,e){e(document).find(".trip-review-stars").length&&e(document).find(".trip-review-stars").each((function(){var t=e(this).data("rating-value");e(this).data("icon-type"),e(this).rateYo({rating:t,starSvg:'<svg width="29" height="28" viewBox="0 0 29 28" stroke="" xmlns="http://www.w3.org/2000/svg"><path d="M13.6636 1.21895C14.0288 0.469865 15.0962 0.469863 15.4614 1.21895L19.0244 8.52811C19.169 8.82468 19.4506 9.03085 19.7769 9.07915L27.7669 10.2617C28.5829 10.3825 28.91 11.3837 28.3227 11.9629L22.527 17.6789C22.2946 17.9081 22.1887 18.2362 22.2432 18.5579L23.6086 26.6191C23.7473 27.4378 22.8855 28.059 22.1526 27.6688L15.0325 23.8773C14.7387 23.7208 14.3863 23.7208 14.0925 23.8773L6.97236 27.6688C6.23947 28.059 5.37772 27.4378 5.51639 26.6191L6.88179 18.5579C6.93629 18.2362 6.83037 17.9081 6.59803 17.6789L0.802323 11.9629C0.214999 11.3837 0.542087 10.3825 1.35811 10.2617L9.34808 9.07915C9.67445 9.03085 9.95599 8.82468 10.1006 8.52812L13.6636 1.21895Z"/></svg>'})})),e(".overall-rating-wrap").appear(),e(document.body).on("appear",".overall-rating-wrap",(function(t,e){jQuery(".rating-bar").each((function(){jQuery(this).find(".rating-bar-inner").animate({width:jQuery(this).find(".rating-bar-inner").attr("data-percent")+"%"},2e3)}))})),e("#commentform").length&&e("#commentform input[type=submit]").click((function(t){if(e("#commentform").valid()&&"0"===e("#commentform").find(".wte-trip-review-rating").find("input[type=hidden]").val())return e(".comment-rating-field-message").show(),goToByScroll("#commentform",10),!1}))}}},e={};function a(n){var o=e[n];if(void 0!==o)return o.exports;var r=e[n]={exports:{}};return t[n](r,r.exports,a),r.exports}a.d=(t,e)=>{for(var n in e)a.o(e,n)&&!a.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},a.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),jQuery(window).on("elementor/frontend/init",(function(){const t=a(958).Z;if(elementorFrontend.hooks.addAction("frontend/element_ready/wte-carousel.default",t),"undefined"!=typeof chartData){const t=a(791).Z;elementorFrontend.hooks.addAction("frontend/element_ready/wte-itinerary.default",(()=>t(chartData)))}if("undefined"!=typeof wte_trip_review_form){const t=a(975).Z,e=a(680).Z;elementorFrontend.hooks.addAction("frontend/element_ready/wte-trip-review-form.default",t),elementorFrontend.hooks.addAction("frontend/element_ready/wte-trip-reviews.default",e)}const e=a(72).Z;elementorFrontend.hooks.addAction("frontend/element_ready/wte-booking.default",e)}))})();