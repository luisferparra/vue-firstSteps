class Errors {

  constructor() {
    this.errors = {};
  }

  /**
   * Función getter de un error
   * @param {*} field 
   */
  get(field) {
    if (this.errors[field]) {
      return this.errors[field][0];
    }
  }

  /**
   * Setter de los errores cuando existen
   * @param {*} errors 
   */
  record(errors) {
    this.errors = errors;
  }

  /**
   * Función que limpia el error cuando se empieza a exribir
   * @param {*} field 
   * @param {*} param1 
   */
  clear(field) {
    if (field) {
      delete this.errors[field];
      return;
    }
    this.errors = {};
  }

  has(field) {
    return this.errors.hasOwnProperty(field);
  }

  any() {
    return Object.keys(this.errors).length > 0;
  }
}




/**
 * Classs FORM
 */

class Form {
  constructor(data) {
    this.originalData = data;
    for (let field in data) {
      this[field] = data[field];
    }
    this.errors = new Errors();

  }

  reset() {
    for (let field in this.originalData) {
      this[field] = '';
    }
    this.errors.clear();
  }

  data() {
    //Lo que hacemos es clonar el objeto dedata pero borramos lo que no necesitamos como originalData y errors
    /**
     * Hay un problema con Ls5 y Ls6. En Les6 se puede utilizar el Object.assign, sin embargo en Les5 no.
     * Por eso hacemos 
     */
    //let data = let Object.assign({},this);
    let keys = Object.keys(this);
    //console.log('Keys', keys);
    //console.log('this', this);
    let data = {};
    for (let j = 0; j < keys.length; j++) {
      if (keys[j] != 'errors' && keys[j] != 'originalData')
        data[keys[j]] = this[keys[j]];
    }
   // console.log('data', data);
    //delete data.originalData;
    //delete data.errors;
    return data;
  }


  submit(requestType, url) {
    //alert(url);
    /**
     * Si todo va bien, se llamarça a resolve, pero si va mal, llamará a reject
     */
    return new Promise((resolve,reject)=>{ 
      axios[requestType](url, this.data())
      .then(response=>{
        this.onSuccess(response.data);
        //Al lanzar el resolve se ejecuta el "then" del método onSubmit de methods del objeto vue
        resolve(response.data);
      })
      .catch(error => {
        //Es errror.response.data.errors o data
        console.log("Errores catch",error);
        this.onFail(error.response.data.errors);
        reject(error.response.data.errors);
      });
     // .catch(this.onFail.bind(this));
      /*  axios[requestType](url, this.data())
      .then(this.onSuccess.bind(this))
      .catch(this.onFail.bind(this)); */
    });
   
  }
/**
 * Gestiona una existorsa llamada
 * @param {object} data 
 */
  onSuccess(data) {
   // alert(response.data.message);
    alert(data.message);
    
    this.reset();
  }

  onFail(errors) {
    console.log("Errores",errors);
   // this.errors.record(error.response.data.errors);
    this.errors.record(errors);
  }
}


new Vue({
  el: '#app',
  data: {
    skills: []
  },
  mounted() {
    console.log('Montado Elemento');
    axios.get('/skillsAjax').then(response => this.skills = response.data);
  }
});

new Vue({
  el: '#root',
  data: {
    form: new Form({
      name: '',
      description: ''
    })
  },
  methods: {
    onSubmit() {
      //alert('submiteando');
      this.form.submit('post', '/projects').
      then(data=>console.log('Data Then',data))
      .catch(error=>console.log('Errores en onsubmit',error));

      console.log('sumiting');

    },
    loggear(field) {
      console.log('Focus out' + field);
    },
    /*onSuccess(response) {
      console.log(response);
      form.reset();
      //alert(response.data.message);
    } 
    */
  },
  mounted() {
    console.log('mounted Root');
  },
  watch: {
    name: function (newQuestion, oldQuestion) {
      console.log('watcher');
    }
  }

});

new Vue({
  el: '#list',
  created() {
    console.log('list created')
  },
  mounted() {
    console.log('list mounted');
  }
});