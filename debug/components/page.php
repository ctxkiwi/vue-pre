
<template>
    <div>
        <ignoretest>zzz</ignoretest>
    <layout :layout-data="layoutData">

        <!-- output && expressions -->
        <div>{{ [1, myVar,3].indexOf(myVar) === 1 ? 'Found' : 'Not found' }}</div>
        <div>DoubleTest: <span>{{ { opacity: true ? 1 : 0.5 } }}</span></div>
        <div>DoubleTest: <span>{{ { opacity: false ? 1 : 0.5 } }}</span></div>
        <div>NotTest: <span>{{ !myObject.myProp ? 1 : 0.5 }}</span></div>
        <div>DONT SHOW: <span v-if="nulltest.value">THIS</span></div>
        <div>DONT SHOW: <span v-if="true && false">THIS</span></div>
        <div>SHOW: <span v-if="nulltest.value == null">THIS</span></div>
        <div>SHOW: <span v-if="true || false">THIS</span></div>
        <div>Class: {{ { test: true ? 'true' : 'false' } }}</div>
        <div class="class_test">{{ 420 }}</div>
        <div style="url('test')" :style="'url(\'test\')'">1</div>
        <div style="url('test')">2</div>
        <div :style="{'background-image': 'url(\'/illustrations/automation.svg\')'}">3</div>
        <div :class="{'background-image': 'url(\'/illustrations/automation.svg\')'}">3</div>
        <div>Func: {{ func('text,text') }}</div>
        <div :my-attr-1="'test1'" v-bind:my-attr-2="'test2'">Attribute test</div>
        <div>1 {{ (typeof(myObject.test) == 'undefined') ? 'Undefined' : 'Defined' }}</div>
        <div>2 {{ (typeof(myObject.myProp) == 'undefined') ? 'Undefined' : 'Defined' }}</div>
        <div>3 {{ myObject.test ? 'Defined' : 'Undefined' }}</div>
        <div>4 {{ myObject.myProp ? 'Defined' : 'Undefined' }}</div>
        <div>5 {{ myObject.test }}</div>
        <div>5 {{ myObject.test + 'x' }}</div>
        <div>{{ "'" }}</div>
        <div>{{ '"' }}</div>
        <div>{{ (1 > 2) ? '' : 'o' }}</div>
        <div>{{ 'four-twenty' }}</div>
        <div>{{ myVar }}</div>
        <div>{{ myObject.myProp }}</div>
        <div>{{ ([1,2,3].indexOf(2) === 1) ? 'Found' : 'Not found' }}</div>
        <div>{{ ([1, myVar,3].indexOf(myVar) === 1) ? 'Found' : 'Not found' }}</div>
        <div>Global: {{ myGlobal }}</div>
        <div>MultiParamFunc: {{ multiParamFunc(1, 2) }}</div>
        <div><input :placeholder="'test'"></div>

        <video controls width="250" :src="'https://thumbs.gfycat.com/EvilObedientAnaconda-mobile.mp4'">
            <track default kind="captions" :srclang="'en'" :src="'https://thumbs.gfycat.com/EvilObedientAnaconda-mobile.mp4'"/>
            Sorry, your browser doesn't support embedded videos.
        </video>

        <div :class="myclass">Class binding</div>
        <div :class="toggle ? 'blue' : 'orange'">Class binding</div>
        <div :class="{ blue: toggle }">Class binding using object</div>
        <div :class="{ blue: !toggle }">Class binding using object</div>
        <div :style="stylee">Style binding</div>

        Toggle template:
        <template v-if="toggle">On</template>
        <template v-else>Off</template>

        <!-- foreach && if/else-if/else -->
        <div v-for="i in [1,2]">
            <h2>Test#{{ i }}</h2>
            <div v-if="myVar === 'Hello'">
                <div v-if="myVar !== 'Hello'">IF1</div>
                <div v-else-if="myVar === 'Hello'">
                    <div v-if="myVar !== 'Hello'">IF2</div>
                    <div v-else-if="i === 1">ELSEIF2</div>
                    <div v-else>ELSE2</div>
                </div>
            </div>
        </div>

        <button v-on:click="tog">Toggle</button>

        <div v-if="toggle">TEST TOGGLE</div>

        <!-- Components + slots -->
        <mypartial :title="title" class="c1" :class="'c2'">
            <template v-slot:header>
                <h1>Here might be a page title</h1>
            </template>
            <div>
                <span>{{ myVar }}</span><span>{{ myVar }}</span>
            </div>
            <p>Rererererererer</p>
        </mypartial>

        <component :is="dynCompo" :title="title"></component>

    </layout>
    </div>
</template>

<script type="text/javascript">

    Vue.component('page', {
        props: ['layoutData', 'title', 'toggle', 'aclass', 'messages', 'myVar', 'myObject', 'dynCompo', 'myclass', 'stylee', 'nulltest', 'multiParamFunc'],
        template: '#vue-template-page',
        data: function () {
            return this.pageData;
        },
        methods: {
          tog: function(){
              this.toggle = !this.toggle;
              console.log(this.toggle);
          },
          multiParamFunc: function(nr1, nr2){
              return nr1 + nr2;
          },
          func: function(x){ return x; }
        },
        created: function(){
            console.log(this.multiParamFunc);
        }
    });
</script>
