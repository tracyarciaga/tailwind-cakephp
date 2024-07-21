# How to use Tailwind in Cakephp

1. Create a new folder "tailwind" - `mkdir tailwind`
2. `cd tailwind`
3. Run `npx tailwindcss init` to create `tailwind.config.js` file
4. Add this to the content section of your

```
    content: [
        "../app/templates/**/*.php",
        "../app/webroot/**/*.js",
        "./src/**/*.{html,js}",
    ],
```

4. Add resources/input.css file with the following contents for example

```
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
    body {
        @apply text-gray-600 font-sans;
    }
}

@layer components {
    .btn-primary {
        @apply py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75;
    }
}
```

5. Run this command to compile your Tailwind CSS
   `npx tailwindcss -i ./resources/input.css -o ../app/webroot/css/app.css --watch --minify`

## Reuse Styles

- https://tailwindcss.com/docs/reusing-styles

#### Reference:

- https://www.blle.co/blog/cakephp-tailwind#:~:text=How%20to%20set%20up%20Tailwind%20CSS%20with%20Cake%20PHP&text=%40tailwind%20base%3B%20%40tailwind%20components,include%20it%20on%20your%20page.

## Tailwind Documentation

https://tailwindcss.com/docs/installation

## Templates

- https://github.com/themesberg/flowbite-admin-dashboard
- https://github.com/surjithctly/astroship/
