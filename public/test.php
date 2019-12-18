

<!DOCTYPE html>

<html>

<head>
    <title>Vue.js Example</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <div id="root">
        <p>Hello. the message of the day is: {{ message }}</p>
    </div>

    <script>
        var app = new Vue({
            el: "#root",
            data: {
                message: "Vue.js is cool!"
            }
        });
        </script>
        </body>
        </html>