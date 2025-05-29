import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        // Check if the page is inside the Admin folder
        if (name.startsWith('Admin/')) {
            return resolvePageComponent(
                `./Pages/Admin/${name.replace('Admin/', '')}.vue`, 
                import.meta.glob('./Pages/Admin/**/*.vue')
            );
        }

        // Default to the Pages folder for non-admin pages
        return resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        );
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});