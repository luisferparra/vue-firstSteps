<!DOCTYPE HTML>
<html>

<head>
    <title>Vue First Steps</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
</head>

<body>
    @verbatim
<div id="app">
    <section class="section">
            <div class="container">
              <h1 class="title">
                Hello World
              </h1>
              <p class="subtitle">
                My first website with <strong>Bulma</strong>!
              </p>
            </div>
          </section>

<div id="div-bulma" class="container">

        <message title="Hello World" body="Lorem Ipsum et dolor est"></message>
        <message title="Hello Universe" body="Accross the Universe..."></message>


    <modal body="lorem ipsun" buttontext="Click aquí para abrir modal"></modal>
    <input type="button" value="Show Modal" @click="">
       
</div>
<div id="div-modal" class="container">

        
</div>


   <div id="root">
<!-- 
        <input type="text" id="input" v-model="message">
        <p>
            the Value of the input is {{ message }}
        </p>
        <p>
            And the reverse is: {{ reversedMessage }}
        </p>
-->
    </div>

    <div id="divarray">
       <!-- <ul>
            <li v-for="name in names" v-text="name"></li>
        </ul>
        <input type="text" id="name" v-model="newBeatle">-->
        <!--- Podemos poner o bien v-on:click="addBeatle" o simplemente @click="addBeatle"-->
        <!--<input type="button" value="addBeatle" @click="addBeatle"> -->

    </div>
    <div id="div_tasks">
      <!--  <h2>All Tasks</h2>
        <ul>
            <li v-for="task in tasks" v-if="task.completed==true" v-text="task.description">

            </li>

        </ul>

        <h2>Uncomplete Tasks</h2>
        <ul>
            <li v-for="task in uncompleteTasks" v-text="task.description">

            </li>

        </ul>
    -->
    </div>
    <div id="divLesson7">
        <!-- <h2>Components</h2>
        <ul>
            <taskt>task uno  </task>
        <task>task dos</task>
    </ul>
<task-list></task-list>-->
    </div>




    
</div>

    @endverbatim

    <!--- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> -->
    <script src="{{asset('js/app.js')}}"></script>
    
    <script>




//ponemos el div delante del task, porque es una iteracción, y necesita vue un elemento raiz, en este caso div
Vue.component('task-list',{
    template: '<div><task v-for="task in tasks" v-text="task.description"></task></div>',
    data() {
return {
    tasks: [
        {description: "do one",completed:true},
        {description: "do two",completed:false},
        {description: "do three",completed:false},
        {description: "do four",completed:false},
        {description: "do five",completed:false},
        {description: "do six",completed:true}

    ]
}
    }
});

Vue.component('task',{
    template: '<li>Foobar<slot></slot></li>'
});




new Vue({
    el: "#divLesson7",
    data: {
        tasks:[
                    {description: "do one",completed:true},
                    {description: "do two",completed:false},
                    {description: "do three",completed:false},
                    {description: "do four",completed:false},
                    {description: "do five",completed:false},
                    {description: "do six",completed:true}
                ]

    }
});

        new Vue({
            el:"#div_tasks",
            data: {
                tasks:[
                    {description: "do one",completed:true},
                    {description: "do two",completed:false},
                    {description: "do three",completed:false},
                    {description: "do four",completed:false},
                    {description: "do five",completed:false},
                    {description: "do six",completed:true}
                ]

                
            },
            computed: {
                uncompleteTasks() {
                    return this.tasks.filter(task=>! task.completed)
                } 
            }
        });



        new Vue({
el: "#root",
data:{
    message : "hellow World"
},
computed: {
reversedMessage() {
return this.message.split('').reverse().join('');
}
}
    });
    var app = new Vue({
        el: "#divarray",
        data :{
            names:['John', 'Paul', 'Ringo', 'George'],
            newBeatle:""
        },
        methods: {
            addBeatle(){
                this.names.push(this.newBeatle);
                this.newBeatle='';

            }
        }
        {{--  mounted(){
            alert('Mountado');
        }  --}}
    });
    </script>

</body>

</html>