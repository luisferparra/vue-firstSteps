<!DOCTYPE HTML>
<html>

<head>
    <title>Vue First Steps</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <style>
body {
    padding-top: 40px;
    background: #CFD8D7;
    padding-bottom: 40px;
}

.button-is-primary {
    border-color: transparent;
    color: #FFCF9C;
    background-color: #9F9AA4;

}

.colorFinal {
    color: #CAB1BD;
    font-weight:bold;
}

.paddingTop {
    padding: 1mm;
}



    </style>
</head>

<body>
   

<div id ="root" class="container">
       <div id="list">
           hola
       </div>
        @if (!empty($projects))
        <ul>

        
            @foreach ($projects as $project)
                <li class="padding colorFinal">
                    {{ $project->name }}
                </li>
            @endforeach
        </ul>
           
        @endif
<form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
    <div class="control" >
        <label for="name" class="label">Project Name:</label>
        <input type="text" name="name" id="name" class="input" v-model="form.name" >
        <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
        
    </div>
    <div class="control">
        <label for="description" class="label">Description</label>
        <input type="text" name="description" id="description" class="input" v-model="form.description"> 
        <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
    </div>
    <div class="control">
        <button class="button button-is-primary" :disabled="form.errors.any()">Store</button>
    </div>


</form>

    
</div>
   

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="/js/app.js"></script>
    
    
    <script>

        </body>

        </html>