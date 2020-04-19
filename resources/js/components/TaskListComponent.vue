<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Person In Charge</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>

            <tbody>
                <!--hamada todo ここあやしい↓<tr v-for="task in tasks">なぜか警告あり-->
                <!--定義したtasksデータをv-forで取り出す。-->
                <tr v-for　="task in tasks">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>{{ task.person_in_charge }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                            <button class="btn btn-primary">Show</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
                    </td>
                </tr>

            <!-- ベタ書きしていたリストを削除。直接ID=1と書いていたがAPIからのレスポンスを受けて表示させるため。
            <tr>
                <th scope="row">1</th>
                <td>Title1</td>
                <td>Content1</td>
                <td>Ichiro</td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: 1}}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.edit', params: {taskId: 1}}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Title2</td>
                <td>Content2</td>
                <td>Jiro</td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: 2}}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.edit', params: {taskId: 2}}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Title3</td>
                <td>Content3</td>
                <td>Saburo</td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: 3}}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.edit', params: {taskId: 3}}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            -->
            </tbody>
        </table>
    </div>
</template>

<script>
/**
 * まず data には空配列の tasks を用意。そして、 methods にある getTasks() メソッドで、タスク一覧取得APIにリクエストして,そのレスポンスを先ほどの tasks の中に入れる。（このメソッドで先ほど話したaxiosを利用してリクエストしています）そして、画面描画時にこの getTasks() メソッドが実行されるように、mounted() でメソッドを呼び出しています。
 */
    export default {
        data: function () {
            return {
                tasks: []
            }
        },
        methods: {
            getTasks() {
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data;
                    });
            },
            deleteTask(id) {
                axios.delete('/api/tasks/' + id)
                .then((res) => {
                    /*削除完了したら、getTasks() メソッドを呼んでタスク一覧を再読み込み。 */
                    this.getTasks();
                });
            }
        },
        mounted() {
            this.getTasks();
        }
    }
</script>