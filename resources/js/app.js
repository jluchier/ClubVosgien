import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';

const swup = new Swup({
    containers: ['#nav', '#swup'],
    plugins: [
        new SwupScrollPlugin({
            animateScroll: true
        }),
    ],
});
