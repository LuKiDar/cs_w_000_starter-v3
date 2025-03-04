# CStheme - WordPress Starter Theme with Gulp

Welcome to **CStheme**, a WordPress starter theme using Gulp as a task runner. This README will guide you through the process of setting up your development environment and running Gulp tasks.

---

## Prerequisites

Before you can run Gulp tasks, you need to ensure the following software is installed on your computer:

### 1. **Node.js** and **npm**  
Gulp requires Node.js and npm (Node Package Manager) to run. If you haven’t installed them yet, download and install the latest version from the [official Node.js website](https://nodejs.org/).

To verify if Node.js and npm are installed:

```bash
node -v
npm -v
```

### 2. **Gulp CLI**  
Gulp CLI is a command line interface that allows you to run Gulp tasks from the terminal. You need to install it globally on your computer.

Install Gulp CLI using npm:

```bash
npm install -g gulp-cli@^3.0.0
```

Verify the installation of Gulp CLI:

```bash
gulp --version
```

You should see the following output:

```
CLI version: 3.0.0
Local version: 5.0.0
```

### 3. **WordPress Environment (Local or Similar)**  
Ensure you have a local WordPress development environment, such as [Local](https://localwp.com/), XAMPP, or Docker, running and set up to test the theme locally.

---

## Setting Up the Project

### 1. Clone the Repository (If applicable)

If you haven't already, clone the project repository to your local machine:

```bash
git clone <repository-url>
```

### 2. Install Dependencies

Once you’ve cloned the project, navigate to the project folder and install all necessary dependencies using npm:

```bash
cd /path/to/your/project
npm install
```

This will install the required development dependencies specified in the `package.json` file.

---

## Running Gulp Tasks

Once you've set up the environment, you can start running Gulp tasks. 

### 1. **Run the Default Task (Sass Compilation, JS Minification, and BrowserSync)**

The default Gulp task will:

- Compile Sass to CSS
- Minify and concatenate JavaScript
- Apply autoprefixer to CSS
- Minify CSS
- Run BrowserSync to auto-reload your browser

To run the default task, simply run:

```bash
npm start
```

This will automatically run the `gulp` command, which starts the default task as defined in the `gulpfile.js`.

### 2. **Individual Tasks**

You can also run individual tasks if you don’t want to run everything at once.

- **Compile Sass:**  

    ```bash
    gulp sass
    ```

- **Minify JavaScript:**

    ```bash
    gulp scripts
    ```

- **Watch Files:**  
    To enable file watching and live reloading with BrowserSync, run the `watch` task:

    ```bash
    gulp watch
    ```

---

## BrowserSync Configuration

BrowserSync will automatically open a browser window or refresh your browser when changes are made to the files being watched.

In the `gulpfile.js`, the proxy URL is set to `https://your-site-name.local`, which should be replaced with the actual URL of your local WordPress site (e.g., `https://example.local`).

```javascript
browserSync.init({
    proxy: "https://your-site-name.local",  // Replace with your local WordPress URL
    open: false, // Prevents BrowserSync from automatically opening a new tab
    notify: false // Optional: hides the BrowserSync notification in the browser
});
```

---

## Troubleshooting

If you encounter any issues with running Gulp, try the following:

1. **Ensure Dependencies Are Installed:**  
   Run `npm install` to ensure all required packages are installed.

2. **Verify Your Node.js Version:**  
   Some older versions of Node.js may not work well with the latest Gulp. Make sure you're using a compatible version of Node.js (v14.x or above).

3. **Clear npm Cache:**  
   Sometimes, clearing the npm cache can resolve issues. You can do this by running:

   ```bash
   npm cache clean --force
   ```

4. **Check for Errors in the Gulp Task:**  
   If a specific task fails, check the terminal for error messages. This will often tell you exactly which part of the task caused the issue.

---

## Conclusion

You’re now set up to work with **CStheme** and the Gulp task runner. This setup will help automate your development workflow and make it easier to compile Sass, minify JS, and keep your assets optimized. 

Feel free to customize the Gulp tasks or add new ones to fit your development needs.

Happy coding! ✨