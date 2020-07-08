<template>
    <div class="container">
        <h1>Todo List</h1>
        <table>
            <div class="todo">
                <input
                    type="text"
                    placeholder="Điền vào đây"
                    v-model="title"
                    @keyup.enter="addTodo()"
                />
            </div>
            <tr>
                <th>Title</th>
            </tr>
            <tr v-for="post in posts" :key="post.id">
                <td>{{ post.title }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userInfo: {},
            posts: [],
            title: ""
        };
    },
    methods: {
        async addTodo() {
            await axios.post("/posts", {
                title: this.title
            });
            console.log(1);
        },
        async getUserInfo() {
            try {
                let userInfo = await axios.post("/auth/me").then();
                this.userInfo = userInfo.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getPost() {
            try {
                let userInfo = await axios.get("/posts").then();
                this.posts = userInfo.data;
            } catch (error) {
                console.log(error);
            }
        },
        async logout() {
            try {
                let userInfo = await axios.post("/auth/logout").then();
                User.logout();
                this.$router.push("/login");
            } catch (error) {
                console.log(error);
            }
        }
    },
    created() {
        this.getUserInfo();
        this.getPost();
    }
};
</script>

<style scoped>
table {
    border-collapse: collapse;
    width: 50%;
    margin: auto;
    margin-top: 200px;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color: #f5f5f5;
}
h1 {
    text-align: center;
}
.todo {
    width: 100%;
    padding: 10px 18px;
    font-size: 18px;
    margin-bottom: 18px;
    margin-left: 50px;
}
.todo input {
    width: 80%;
    margin-left: 25px;
}
</style>
