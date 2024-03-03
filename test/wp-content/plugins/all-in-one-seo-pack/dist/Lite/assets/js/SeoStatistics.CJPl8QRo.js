import{B as P,f as B}from"./links.BhxvVKuk.js";import{C as L}from"./Blur.B433XVqJ.js";import{C as U}from"./Card.DILuNRbD.js";import{G,S as R}from"./SeoStatisticsOverview.CXk6kIFg.js";import{G as q,a as E}from"./Row.ou4tdPuA.js";import{P as N}from"./PostsTable.167rEUDR.js";import{y as s,o as p,l as h,m as o,a as y,D as i,E as m,t as _,c as v,d as b}from"./vue.esm-bundler.DzelZkHk.js";import{_ as f}from"./_plugin-vue_export-helper.BN1snXvA.js";import{C as O}from"./Index.Ck0NNxBQ.js";import{R as D}from"./RequiredPlans.cCaGWq6E.js";import{L as H}from"./LicenseConditions.p5Bq5TVC.js";import"./default-i18n.BtxsUzQk.js";import"./isArrayLikeObject.CkjpbQo7.js";import"./Tooltip.DcUmvaHX.js";import"./Caret.Cuasz9Up.js";import"./index.DX4OhBfI.js";import"./Slide.BfXXFx9A.js";import"./numbers.ursUutt1.js";import"./license.B4xmRPjf.js";import"./upperFirst.Cx8cdEgZ.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.EVG10Qqs.js";import"./WpTable.CrrU5x2U.js";import"./ScoreButton.Di04Mqf2.js";import"./Table.Bz5gy8WC.js";import"./IndexStatus.DWPPjohw.js";import"./PostTypes.Cef6XkQ_.js";import"./constants.DARe-ccJ.js";import"./addons.D3pL3mTq.js";import"./_arrayEach.Fgt6pfHj.js";import"./_getTag.0B4_HiWU.js";import"./vue.esm-bundler.v8OKKE5o.js";const V={setup(){return{searchStatisticsStore:P()}},components:{CoreBlur:L,CoreCard:U,Graph:G,GridColumn:q,GridRow:E,PostsTable:N,SeoStatisticsOverview:R},data(){return{strings:{seoStatisticsCard:this.$t.__("SEO Statistics",this.$td),seoStatisticsTooltip:this.$t.__("The following SEO Statistics graphs are useful metrics for understanding the visibility of your website or pages in search results and can help you identify trends or changes over time.<br /><br />Note: This data is capped at the top 100 keywords per day to speed up processing and to help you prioritize your SEO efforts, so while the data may seem inconsistent with Google Search Console, this is intentional.",this.$td),contentCard:this.$t.__("Content",this.$td),postsTooltip:this.$t.__("These lists can be useful for understanding the performance of specific pages or posts and identifying opportunities for improvement. For example, the top winning content may be good candidates for further optimization or promotion, while the top losing may need to be reevaluated and potentially updated.",this.$td)},defaultPages:{rows:[],totals:{page:0,pages:0,total:0}}}},computed:{series(){var e,a,n,r;return!((a=(e=this.searchStatisticsStore.data)==null?void 0:e.seoStatistics)!=null&&a.statistics)||!((r=(n=this.searchStatisticsStore.data)==null?void 0:n.seoStatistics)!=null&&r.intervals)?[]:[{name:this.$t.__("Search Impressions",this.$td),data:this.searchStatisticsStore.data.seoStatistics.intervals.map(t=>({x:t.date,y:t.impressions})),legend:{total:this.searchStatisticsStore.data.seoStatistics.statistics.impressions}},{name:this.$t.__("Search Clicks",this.$td),data:this.searchStatisticsStore.data.seoStatistics.intervals.map(t=>({x:t.date,y:t.clicks})),legend:{total:this.searchStatisticsStore.data.seoStatistics.statistics.clicks}}]}}},A={class:"aioseo-search-statistics-dashboard"},F=["innerHTML"];function M(e,a,n,r,t,u){const c=s("seo-statistics-overview"),l=s("graph"),d=s("core-card"),k=s("posts-table"),C=s("grid-column"),x=s("grid-row"),T=s("core-blur");return p(),h(T,null,{default:o(()=>[y("div",A,[i(x,null,{default:o(()=>[i(C,null,{default:o(()=>[i(d,{class:"aioseo-seo-statistics-card",slug:"seoPerformance","header-text":t.strings.seoStatisticsCard,toggles:!1,"no-slide":""},{tooltip:o(()=>[y("span",{innerHTML:t.strings.seoStatisticsTooltip},null,8,F)]),default:o(()=>[i(c,{statistics:["impressions","clicks","ctr","position"],"show-graph":!1,view:"side-by-side"}),i(l,{"multi-axis":"",series:u.series,"legend-style":"simple"},null,8,["series"])]),_:1},8,["header-text"]),i(d,{slug:"posts","header-text":t.strings.contentCard,toggles:!1,"no-slide":""},{tooltip:o(()=>[m(_(t.strings.postsTooltip),1)]),default:o(()=>{var g,S,$;return[i(k,{posts:(($=(S=(g=r.searchStatisticsStore.data)==null?void 0:g.seoStatistics)==null?void 0:S.pages)==null?void 0:$.paginated)||t.defaultPages,columns:["postTitle","indexStatus","seoScore","clicksSortable","impressionsSortable","positionSortable","diffPositionSortable"],"show-items-per-page":"","show-table-footer":""},null,8,["posts"])]}),_:1},8,["header-text"])]),_:1})]),_:1})])]),_:1})}const z=f(V,[["render",M]]),I={setup(){return{licenseStore:B()}},components:{Blur:z,Cta:O,RequiredPlans:D},data(){return{strings:{ctaButtonText:this.$t.__("Unlock Search Statistics",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Search Statistics is a %1$s Feature",this.$td),"PRO"),ctaDescription:this.$t.__("Connect your site to Google Search Console to receive insights on how content is being discovered. Identify areas for improvement and drive traffic to your website.",this.$td),thisFeatureRequires:this.$t.__("This feature requires one of the following plans:",this.$td),feature1:this.$t.__("Search traffic insights",this.$td),feature2:this.$t.__("Track page rankings",this.$td),feature3:this.$t.__("Track keyword rankings",this.$td),feature4:this.$t.__("Speed tests for individual pages/posts",this.$td)}}}},j={class:"aioseo-search-statistics-seo-statistics"};function J(e,a,n,r,t,u){const c=s("blur"),l=s("required-plans"),d=s("cta");return p(),v("div",j,[i(c),i(d,{"cta-link":e.$links.getPricingUrl("search-statistics","search-statistics-upsell","seo-statistics"),"button-text":t.strings.ctaButtonText,"learn-more-link":e.$links.getUpsellUrl("search-statistics","seo-statistics",e.$isPro?"pricing":"liteUpgrade"),"feature-list":[t.strings.feature1,t.strings.feature2,t.strings.feature3,t.strings.feature4],"align-top":"","hide-bonus":!r.licenseStore.isUnlicensed},{"header-text":o(()=>[m(_(t.strings.ctaHeader),1)]),description:o(()=>[i(l,{"core-feature":["search-statistics","seo-statistics"]}),m(" "+_(t.strings.ctaDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list","hide-bonus"])])}const w=f(I,[["render",J]]),K={mixins:[H],components:{SeoStatistics:w,Lite:w}},Q={class:"aioseo-search-statistics-seo-statistics"};function W(e,a,n,r,t,u){const c=s("seo-statistics",!0),l=s("lite");return p(),v("div",Q,[e.shouldShowMain("search-statistics","seo-statistics")?(p(),h(c,{key:0})):b("",!0),e.shouldShowUpgrade("search-statistics","seo-statistics")||e.shouldShowLite?(p(),h(l,{key:1})):b("",!0)])}const Bt=f(K,[["render",W]]);export{Bt as default};
