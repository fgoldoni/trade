import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import aspectRatio from '@tailwindcss/aspect-ratio';
const colors = require('tailwindcss/colors');
const flowbite = require('flowbite/plugin');

/** @type {import('tailwindcss').Config} */

const colorSaveList = [];
const extendeColors = {};

for (const key in colors) {
    extendeColors[key] = colors[key];

    [100, 200, 300, 400, 500, 600, 700, 800, 900].forEach((colorValue) => {
        colorSaveList.push(`text-${key}-${colorValue}`);
        colorSaveList.push(`dark:text-${key}-${colorValue}`);
        colorSaveList.push(`bg-${key}-${colorValue}`);
        colorSaveList.push(`hover:bg-${key}-${colorValue}`);
        colorSaveList.push(`dark:hover:bg-${key}-${colorValue}`);
        colorSaveList.push(`dark:hover:text-${key}-${colorValue}`);
        colorSaveList.push(`group-hover:text-${key}-${colorValue}`);
        colorSaveList.push(`dark:group-hover:text-${key}-${colorValue}`);
        colorSaveList.push(`group-hover:bg-${key}-${colorValue}`);
        colorSaveList.push(`hover:text-${key}-${colorValue}`);
        colorSaveList.push(`ring-${key}-${colorValue}`);
        colorSaveList.push(`dark:ring-${key}-${colorValue}`);
        colorSaveList.push(`focus:ring-${key}-${colorValue}`);
        colorSaveList.push(`peer-focus:dark:text-${key}-${colorValue}`);
        colorSaveList.push(`peer-focus:text-${key}-${colorValue}`);
        colorSaveList.push(`focus:border-${key}-${colorValue}`);
        colorSaveList.push(`focus-within:ring-${key}-${colorValue}`);
        colorSaveList.push(`border-${key}-${colorValue}`);
        colorSaveList.push(`divide-${key}-${colorValue}`);
        colorSaveList.push(`from-${key}-${colorValue}`);
        colorSaveList.push(`fill-${key}-${colorValue}`);
        colorSaveList.push(`to-${key}-${colorValue}`);
    });
}
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [...colorSaveList],

    theme: {
        extend: {
            colors: {
                primary: colors.indigo,
                secondary: colors.slate,
                danger: colors.red,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography, aspectRatio, flowbite],
};
