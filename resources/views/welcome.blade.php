<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>

<div id="app">
    <input type="text" v-model="coupon">

    <coupon v-model="coupon"></coupon>
</div>


<div id="one">
    @{{shared.user.name}}
</div>


<div id="two">
    @{{shared.user.name}}
</div>

<script src="/js/app.js"></script>
</body>
</html>
