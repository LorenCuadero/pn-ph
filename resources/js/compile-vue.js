import $ from "jquery";
import { createApp } from "vue";
import axios from "axios";

let vueAppList = {};
let languageResource = null;
var languageResourceVersion = "";

import AdminRegisterControl from './components/admin/cmpt-admin-register.vue'; 
import StaffEditControl from "./components/staff/cmpt-staff-edit.vue";
import StaffAddControl from "./components/staff/cmpt-staff-add.vue";
import StudentAcademicControl from "./components/student/cmpt-student-acd-rpt.vue";

vueAppList['cmpt-admin-register'] = createApp(AdminRegisterControl);
vueAppList["cmpt-staff-edit"] = createApp(StaffEditControl);
vueAppList["cmpt-staff-add"] = createApp(StaffAddControl);
vueAppList["cmpt-student-acd-rpt"] = createApp(StudentAcademicControl);

function initVueComponents() {
    var defaultLocale = "en";
    var fallbackLocale = "en";

    if (typeof window.defaultLocale !== "undefined") {
        defaultLocale = window.defaultLocale;
    }

    if (typeof window.fallbackLocale !== "undefined") {
        fallbackLocale = window.fallbackLocale;
    }

    const LangCustom = new Lang({
        messages: languageResource,
        locale: defaultLocale,
        fallback: fallbackLocale,
    });

    var routeName = $("body").data("page");
    var vueComponents = {};

    if (typeof window.vueComponentPageKeyValuPair !== "undefined") {
        vueComponents = window.vueComponentPageKeyValuPair;
    }

    var components;

    for (var route in vueComponents) {
        if (routeName == route) {
            components = vueComponents[route];

            for (var i in components) {
                let elements = $(components[i]);

                for (let el of elements) {
                    vueAppList[components[i]].config.globalProperties.__ = (key, replacements, locale) => {
                        return LangCustom.get(key, replacements, locale);
                    };
                    vueAppList[components[i]].mount(components[i]);
                }
            }
        }
    }
}