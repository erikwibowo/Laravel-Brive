import { createSSRApp, h } from 'vue';
import { renderToString } from '@vue/server-renderer';
import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import FloatingVue from 'floating-vue'
import { usePage } from '@inertiajs/vue3';

const appName = 'Laravel';

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
        setup({ App, props, plugin }) {
            return createSSRApp({ render: () => h(App, props) })
                .use(plugin)
                .use(ZiggyVue, {
                    ...page.props.ziggy,
                    location: new URL(page.props.ziggy.location),
                })
                .use(FloatingVue)
                .mixin({
                    methods: {
                        can: function (permissions) {
                            var allPermissions = this.$page.props.auth.can;
                            var hasPermission = false;
                            permissions.forEach(function (item) {
                                if (allPermissions[item]) hasPermission = true;
                            });
                            return hasPermission;
                        },
                        lang: function () {
                            return usePage().props.language.original;
                        }
                    },
                });
        },
    })
);
