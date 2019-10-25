<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.3/css/bulma.css">
    <style>body {
            padding-top: 40px;
        }</style>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>

<body>
<div id="app" class="container">
    <Notification></Notification>

    <carousel :autoplay="true">
        <img src="https://placeimg.com/640/480/any" alt="">
        <img src="https://placeimg.com/640/480/any?2" alt="">
        <img src="https://placeimg.com/640/480/any?3" alt="">
        <img src="https://placeimg.com/640/480/any?4" alt="">
        <img src="https://placeimg.com/640/480/any?5" alt="">

    </carousel>

    <series-dropdown>

    </series-dropdown>
    @include ('projects.list')

    <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="control">
            <label for="name" class="label">Project Name:</label>

            <input type="text" id="name" name="name" class="input" v-model="form.name">

            <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
        </div>

        <div class="control">
            <label for="description" class="label">Project Description:</label>

            <input type="text" id="description" name="description" class="input" v-model="form.description">

            <span class="help is-danger" v-if="form.errors.has('description')"
                  v-text="form.errors.get('description')"></span>
        </div>

        <div class="control">
            <button class="button is-primary" :disabled="form.errors.any()">Create</button>
        </div>
    </form>

    <portal-target name="nav-after"></portal-target>

    <support-button></support-button>

    <h3>Any where else on the website we can render an accordion</h3>

    <div class="container">
        <div class="w-3/5 text-center">
            <accordion title="What's up my nigg?" body="this is how it is my friends!!">

            </accordion>
        </div>
    </div>


    <div class="container">
        <div class="w-3/5 text-center">
            <accordion2 :items="{{$questions}}">

            </accordion2>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>
