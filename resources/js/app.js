/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//const files = require.context('./', true, /\.vue$/i)
//files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "surveyquestion-component",
    require("./components/SurveyQuestionComponent.vue").default
);
Vue.component(
    "surveyquestioninfo",
    require("./components/SurveyQuestionInfo.vue").default
);
Vue.component(
    "surveyquestionedit",
    require("./components/SurveyQuestionEdit.vue").default
);
Vue.component("textcontent", require("./components/TextContent.vue").default);

Vue.component(
    "datadump",
    require("./components/DataDumpComponent.vue").default
);

Vue.component(
    "category-component",
    require("./components/CategoryComponent.vue").default
);
Vue.component("categoryinfo", require("./components/CategoryInfo.vue").default);
Vue.component("categoryedit", require("./components/CategoryEdit.vue").default);
Vue.component(
    "pagecontroller",
    require("./components/PageController.vue").default
);
Vue.component("pagemapper", require("./components/PageMapper.vue").default);
Vue.component(
    "pagemanager",
    require("./components/SurveyPageManager.vue").default
);

Vue.component("modal", require("./components/Modal.vue").default);
Vue.component(
    "editsurveypage",
    require("./components/EditSurveyPage.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
