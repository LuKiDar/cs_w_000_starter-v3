# CStheme - WordPress Starter Theme with Gulp

Welcome to **CStheme**, a WordPress starter theme powered by **Gulp**! This README will guide you through getting everything up and running quickly so you can dive right into development.

---

## Prerequisites

Before we get started, make sure you have a couple of things set up:

### 1. **Node.js & npm**
You’ll need Node.js and npm installed to run the tasks. If you don’t have them, grab them from [here](https://nodejs.org/).

Check if you already have them:

```bash
node -v
npm -v
````

### 2. **Gulp CLI**

We’ll use the Gulp command-line interface (CLI) to run tasks. Install it globally with:

```bash
npm install -g gulp-cli@^3.0.0
```

Once installed, check it with:

```bash
gulp --version
```

You should see the following output:

```bash
CLI version: 3.0.0
Local version: 5.0.0
```


### 3. **WordPress Environment**

Make sure you have a local WordPress environment set up (using [Local](https://localwp.com/), XAMPP, or something similar). We need a place to run the theme and see the magic happen.

---

## Setting Up the Project

### 1. **Clone the Repo**

Grab the project by cloning it:

```bash
git clone <repo-url>
```

### 2. **Install Dependencies**

Go to your project folder and install the required packages:

```bash
cd /path/to/your/project
npm install
```

---

## Running Gulp Tasks

Now you’re ready to run Gulp! Here’s the magic that’ll make your life easier.

### 1. **Run Everything**

To run all the tasks (like compiling Sass, minifying JS, and refreshing your browser with BrowserSync), just type:

```bash
npm start
```

It will:

- Automatically run the `gulp` command
- Compile your Sass into CSS
- Minify and concatenate your JS
- Refresh the browser when files change

### 2. **Run Specific Tasks**

You can run individual tasks too if you just want to focus on one thing.

- **Compile Sass:**

  ```bash
  gulp compileSass
  ```

- **Minify JS:**

  ```bash
  gulp minifyJS
  ```

- **Watch Files (for auto-reloading):**

  ```bash
  gulp watch
  ```

---

## BrowserSync

BrowserSync makes sure you never have to manually refresh your browser. It will automatically open the site or reload it when changes are detected. Just make sure to point it to your local WordPress site URL in the `gulpfile.js`.

```javascript
browserSync.init({
    proxy: "https://your-site-name.local",  // Replace with your local WordPress URL
    open: false, // Stops BrowserSync from opening a new tab automatically
    notify: false // Hides the notification in the browser
});
```

---

## Troubleshooting

If something goes wrong (and we all know that happens sometimes):

1. **Check Your Dependencies:**\
   Run `npm install` again just to make sure everything’s in place.

2. **Clear npm Cache:**\
   If things seem a little off, clearing the npm cache might help:

   ```bash
   npm cache clean --force
   ```

3. **Check for Errors in the Terminal:**\
   The terminal is your friend. It’ll usually tell you exactly what went wrong.

4. **Pray to ChatGPT and Google Search for further instructions**

---

Enjoy the process, and happy coding! 🚀
Yours truly Dariia