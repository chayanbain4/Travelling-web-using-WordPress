import{f as a,a as o}from"./links.BhxvVKuk.js";import{a as i}from"./addons.D3pL3mTq.js";import{a as n}from"./allowed.BqqivOa5.js";const u={computed:{toolsSettings(){const e=a(),s=[{value:"webmasterTools",label:this.$t.__("Webmaster Tools",this.$td),access:"aioseo_general_settings"},{value:"rssContent",label:this.$t.__("RSS Content",this.$td),access:"aioseo_general_settings"},{value:"advanced",label:this.$t.__("Advanced",this.$td),access:"aioseo_general_settings"},{value:"searchAppearance",label:this.$t.__("Search Appearance",this.$td),access:"aioseo_search_appearance_settings"},{value:"social",label:this.$t.__("Social Networks",this.$td),access:"aioseo_social_networks_settings"},{value:"sitemap",label:this.$t.__("Sitemaps",this.$td),access:"aioseo_sitemap_settings"},{value:"robots",label:this.$t.__("Robots.txt",this.$td),access:"aioseo_tools_settings"},{value:"breadcrumbs",label:this.$t.__("Breadcrumbs",this.$td),access:"aioseo_general_settings"}];return o().internalOptions.internal.deprecatedOptions.includes("badBotBlocker")&&s.push({value:"blocker",label:this.$t.__("Bad Bot Blocker",this.$td),access:"aioseo_tools_settings"}),this.$isPro&&s.push({value:"accessControl",label:this.$t.__("Access Control",this.$td),access:"aioseo_admin"}),!e.isUnlicensed&&this.showAddonReset("aioseo-image-seo")&&s.push({value:"image",label:this.$t.__("Image SEO",this.$td),access:"aioseo_search_appearance_settings"}),!e.isUnlicensed&&this.showAddonReset("aioseo-local-business")&&s.push({value:"localBusiness",label:this.$t.__("Local Business SEO",this.$td),access:"aioseo_local_seo_settings"}),!e.isUnlicensed&&this.showAddonReset("aioseo-redirects")&&s.push({value:"redirects",label:this.$t.__("Redirects",this.$td),access:"aioseo_redirects_settings"}),!e.isUnlicensed&&this.showAddonReset("aioseo-link-assistant")&&s.push({value:"linkAssistant",label:this.$t.__("Link Assistant",this.$td),access:"aioseo_link_assistant_settings"}),!e.isUnlicensed&&this.showAddonReset("aioseo-eeat")&&s.push({value:"eeat",label:this.$t.__("Author SEO (E-E-A-T)",this.$td),access:"aioseo_search_appearance_settings"}),s.filter(t=>n(t.access))}},methods:{showAddonReset(e){const s=i.getAddon(e);return s&&s.isActive&&!s.requiresUpgrade}}};export{u as T};
