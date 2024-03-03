import{c as H,f as P,o as b,u as N}from"./links.BhxvVKuk.js";import{a as L}from"./addons.D3pL3mTq.js";import{g as Z}from"./params.B3T1WKlC.js";import{U as q}from"./Url.DOSCnr7T.js";import{C as B,b as I,S as T}from"./Caret.Cuasz9Up.js";import{C as Y}from"./Index.DqmzQR7m.js";import{C as x}from"./Tooltip.DcUmvaHX.js";import{y as c,o as t,c as a,a as i,q as k,t as n,d as r,l as p,m as l,E as _,I as C,D as h,H as w}from"./vue.esm-bundler.DzelZkHk.js";import{_ as m}from"./_plugin-vue_export-helper.BN1snXvA.js";const R={setup(){return{addonsStore:H(),licenseStore:P(),pluginsStore:b(),rootStore:N()}},mixins:[q],components:{CoreAlert:B,CoreLoader:I,CoreModal:Y,CoreTooltip:x,SvgClose:T},props:{feature:{type:Object,required:!0},canActivate:{type:Boolean,default(){return!0}},canManage:{type:Boolean,default(){return!1}},staticCard:Boolean},data(){return{addons:L,addon:{},showNetworkModal:!1,failed:!1,loading:!1,featureUpgrading:!1,strings:{version:this.$t.__("Version",this.$td),updateToVersion:this.$t.__("Update to version",this.$td),activated:this.$t.__("Activated",this.$td),deactivated:this.$t.__("Deactivated",this.$td),notInstalled:this.$t.__("Not Installed",this.$td),upgradeToPro:this.$t.__("Upgrade to Pro",this.$td),upgradeYourPlan:this.$t.__("Upgrade Your Plan",this.$td),updateFeature:this.$t.__("Update Addon",this.$td),permissionWarning:this.$t.__("You currently don't have permission to update this addon. Please ask a site administrator to update.",this.$td),manage:this.$t.__("Manage",this.$td),activateError:this.$t.__("An error occurred while activating the addon. Please upload it manually or contact support for more information.",this.$td),updateRequired:this.$t.sprintf(this.$t.__("An update is required for this addon to continue to work with %1$s %2$s.",this.$td),"AIOSEO","Pro"),areYouSureNetworkChange:this.$t.__("This is a network-wide change.",this.$td),yesProcessNetworkChange:this.$t.__("Yes, process this network change",this.$td),noChangedMind:this.$t.__("No, I changed my mind",this.$td)}}},computed:{networkChangeMessage(){return this.addon.isActive?this.$t.__("Are you sure you want to activate this addon across the network?",this.$td):this.$t.__("Are you sure you want to deactivate this addon across the network?",this.$td)}},methods:{closeNetworkModal(s=!1){this.addon.isActive=!s,this.showNetworkModal=!1,s&&this.actuallyProcessStatusChange(s)},processStatusChange(s){if(this.addon.isActive=s,this.rootStore.aioseo.data.isNetworkAdmin){this.showNetworkModal=!0;return}this.actuallyProcessStatusChange()},actuallyProcessStatusChange(){this.failed=!1,this.loading=!0;const s=this.addon.isActive?"installPlugins":"deactivatePlugins";this.pluginsStore[s]([{plugin:this.addon.basename}]).then(o=>{this.loading=!1,o.body.failed.length&&(this.addon.isActive=!this.addon.isActive,this.failed=!0)}).catch(()=>{this.loading=!1,this.addon.isActive=!this.addon.isActive})},processUpgradeFeature(){this.failed=!1,this.featureUpgrading=!0,this.pluginsStore.upgradePlugins([{plugin:this.addon.sku}]).then(s=>{if(this.featureUpgrading=!1,s.body.failed.length){this.addon.isActive=!1,this.failed=!0;return}this.addon=this.addons.getAddon(this.addon.sku)}).catch(()=>{this.featureUpgrading=!1,this.addon.isActive=!1})}},mounted(){this.addon=this.addons.getAddon(this.feature.sku);const s=Z();!this.addon.isActive&&s["aioseo-activate"]&&s["aioseo-activate"]===this.addon.sku&&(this.loading=!0,this.addon.isActive=!0,this.pluginsStore.installPlugins([{plugin:this.addon.basename}]).then(()=>this.loading=!1).catch(()=>{this.loading=!1,this.addon.isActive=!this.addon.isActive}))}},z={class:"aioseo-feature-card"},E={class:"feature-card-header"},F={class:"feature-card-description"},O={key:0,class:"learn-more"},D=["href"],G=["href"],W={key:1,class:"learn-more"},j=["href"],J=["href"],K={key:0,class:"feature-card-install-activate"},Q={key:1,class:"version"},X={class:"status"},$={key:1,class:"feature-card-upgrade-cta"},ee={key:0},se={key:1},te={key:2,class:"feature-card-upgrade-cta"},oe={class:"version"},ne={key:0},ie={class:"aioseo-modal-body"},re={class:"reset-description"};function ae(s,o,g,v,e,d){const y=c("core-alert"),A=c("core-loader"),V=c("base-toggle"),f=c("base-button"),M=c("core-tooltip"),U=c("svg-close"),S=c("core-modal");return t(),a("div",z,[i("div",{class:C(["feature-card-body",{static:g.staticCard}])},[i("div",E,[k(s.$slots,"title")]),i("div",F,[k(s.$slots,"description"),(!e.addon.isActive||e.addon.requiresUpgrade)&&!g.staticCard?(t(),a("div",O,[i("a",{href:s.$links.utmUrl("feature-manager-addon-link",e.addon.sku,e.addon.learnMoreUrl),target:"_blank"},n(s.$constants.GLOBAL_STRINGS.learnMore),9,D),i("a",{href:s.$links.utmUrl("feature-manager-addon-link",e.addon.sku,e.addon.learnMoreUrl),class:"no-underline",target:"_blank"}," →",8,G)])):r("",!0),e.addon.manageUrl&&(e.addon.isActive&&!e.addon.requiresUpgrade||g.staticCard)&&g.canManage?(t(),a("div",W,[i("a",{href:s.getHref(e.addon.manageUrl)},n(e.strings.manage),9,j),i("a",{href:s.getHref(e.addon.manageUrl),class:"no-underline"}," → ",8,J)])):r("",!0),e.failed?(t(),p(y,{key:2,class:"install-failed",type:"red"},{default:l(()=>[_(n(e.strings.activateError),1)]),_:1})):r("",!0)])],2),g.canActivate?(t(),a("div",{key:0,class:C(["feature-card-footer",{"upgrade-required":e.addon.requiresUpgrade||!v.licenseStore.license.isActive}])},[!e.addon.requiresUpgrade&&v.licenseStore.license.isActive&&(!e.addon.installed||e.addon.hasMinimumVersion)?(t(),a("div",K,[e.loading?(t(),p(A,{key:0,dark:""})):r("",!0),!e.loading&&e.addon.installedVersion?(t(),a("span",Q,n(e.strings.version)+" "+n(e.addon.installedVersion),1)):r("",!0),i("span",X,n(e.addon.isActive?e.strings.activated:e.addon.installed||e.addon.canInstall?e.strings.deactivated:e.strings.notInstalled),1),e.addon.installed||e.addon.canInstall?(t(),p(V,{key:2,modelValue:e.addon.isActive,"onUpdate:modelValue":o[0]||(o[0]=u=>d.processStatusChange(u))},null,8,["modelValue"])):r("",!0)])):r("",!0),e.addon.requiresUpgrade||!v.licenseStore.license.isActive?(t(),a("div",$,[h(f,{type:"green",size:"medium",tag:"a",href:s.$links.getUpsellUrl("feature-manager-upgrade",e.addon.sku,s.$isPro?"pricing":"liteUpgrade"),target:"_blank"},{default:l(()=>[s.$isPro?(t(),a("span",ee,n(e.strings.upgradeYourPlan),1)):r("",!0),s.$isPro?r("",!0):(t(),a("span",se,n(e.strings.upgradeToPro),1))]),_:1},8,["href"])])):r("",!0),s.$isPro&&!e.addon.requiresUpgrade&&e.addon.installed&&!e.addon.hasMinimumVersion?(t(),a("div",te,[e.addon.isActive&&!e.loading?(t(),p(M,{key:0},{tooltip:l(()=>[_(n(e.strings.updateRequired)+" ",1),e.addons.userCanUpdate(e.addon.sku)?r("",!0):(t(),a("strong",ne,n(e.strings.permissionWarning),1))]),default:l(()=>[i("span",oe,n(e.strings.updateToVersion)+" "+n(e.addon.minimumVersion),1)]),_:1})):r("",!0),h(f,{type:"blue",size:"medium",onClick:d.processUpgradeFeature,loading:e.featureUpgrading,disabled:!e.addons.userCanUpdate(e.addon.sku)},{default:l(()=>[_(n(e.strings.updateFeature),1)]),_:1},8,["onClick","loading","disabled"])])):r("",!0)],2)):r("",!0),h(S,{show:e.showNetworkModal,"no-header":"",onClose:o[5]||(o[5]=u=>d.closeNetworkModal(!1)),classes:["aioseo-feature-card-modal"]},{body:l(()=>[i("div",ie,[i("button",{class:"close",onClick:o[2]||(o[2]=w(u=>d.closeNetworkModal(!1),["stop"]))},[h(U,{onClick:o[1]||(o[1]=w(u=>d.closeNetworkModal(!1),["stop"]))})]),i("h3",null,n(e.strings.areYouSureNetworkChange),1),i("div",re,n(d.networkChangeMessage),1),h(f,{type:"blue",size:"medium",onClick:o[3]||(o[3]=u=>d.closeNetworkModal(!0))},{default:l(()=>[_(n(e.strings.yesProcessNetworkChange),1)]),_:1}),h(f,{type:"gray",size:"medium",onClick:o[4]||(o[4]=u=>d.closeNetworkModal(!1))},{default:l(()=>[_(n(e.strings.noChangedMind),1)]),_:1})])]),_:1},8,["show"])])}const Le=m(R,[["render",ae]]),de={},le={viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},ce=i("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M11 15H7C5.35 15 4 13.65 4 12C4 10.35 5.35 9 7 9H11V7H7C4.24 7 2 9.24 2 12C2 14.76 4.24 17 7 17H11V15ZM17 7H13V9H17C18.65 9 20 10.35 20 12C20 13.65 18.65 15 17 15H13V17H17C19.76 17 22 14.76 22 12C22 9.24 19.76 7 17 7ZM16 11H8V13H16V11Z",fill:"currentColor"},null,-1),ue=[ce];function he(s,o){return t(),a("svg",le,ue)}const Ze=m(de,[["render",he]]),ge={},_e={viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg",class:"aioseo-redirect"},fe=i("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M10.59 9.17L5.41 4L4 5.41L9.17 10.58L10.59 9.17ZM14.5 4L16.54 6.04L4 18.59L5.41 20L17.96 7.46L20 9.5V4H14.5ZM13.42 14.82L14.83 13.41L17.96 16.54L20 14.5V20H14.5L16.55 17.95L13.42 14.82Z",fill:"currentColor"},null,-1),pe=[fe];function me(s,o){return t(),a("svg",_e,pe)}const qe=m(ge,[["render",me]]),ve={},ke={viewBox:"0 0 28 28",fill:"none",xmlns:"http://www.w3.org/2000/svg",class:"aioseo-sitemaps-pro"},Ce=i("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M23.45 3.5H4.55C3.96667 3.5 3.5 3.96667 3.5 4.55V23.45C3.5 23.9167 3.96667 24.5 4.55 24.5H23.45C23.9167 24.5 24.5 23.9167 24.5 23.45V4.55C24.5 3.96667 23.9167 3.5 23.45 3.5ZM10.5 8.16667H8.16667V10.5H10.5V8.16667ZM19.8333 8.16667H12.8333V10.5H19.8333V8.16667ZM19.8333 12.8333H12.8333V15.1667H19.8333V12.8333ZM12.8333 17.5H19.8333V19.8333H12.8333V17.5ZM8.16667 12.8333H10.5V15.1667H8.16667V12.8333ZM10.5 17.5H8.16667V19.8333H10.5V17.5ZM5.83333 22.1667H22.1667V5.83333H5.83333V22.1667Z",fill:"currentColor"},null,-1),we=[Ce];function ye(s,o){return t(),a("svg",ke,we)}const Be=m(ve,[["render",ye]]);export{Le as C,Ze as S,qe as a,Be as b};
