## How to use Tailwind in Cakephp

1. Create a new folder "external"
2. Create `tailwind.config.js` file
3. Add this to the content section of your

```
    content: [
        "../templates/**/*.php",
        "../webroot/**/*.js",
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
```

5. Run this command to compile your Tailwind CSS
   `npx tailwindcss -i ./resources/input.css -o ./webroot/css/app.css --watch --minify`

Reference:

- https://tailwindcss.com/docs/installation

- https://www.blle.co/blog/cakephp-tailwind#:~:text=How%20to%20set%20up%20Tailwind%20CSS%20with%20Cake%20PHP&text=%40tailwind%20base%3B%20%40tailwind%20components,include%20it%20on%20your%20page.

### Tailwind Documentation

https://tailwindcss.com/docs/installation

### Templates

- https://github.com/themesberg/flowbite-admin-dashboard
- https://github.com/surjithctly/astroship/
