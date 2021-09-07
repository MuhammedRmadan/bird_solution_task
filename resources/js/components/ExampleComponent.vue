<template>
    <div class="container">
        <h1 id="score">
            Score : {{score}}
        </h1>
        <table>
            <tr>
                <th>
                    Type
                </th>
                <th>
                    Repository
                </th>
                <th>
                    Date
                </th>
                <th>
                    Points
                </th>
            </tr>
            <tbody>
            <result v-for="repoData in repoArray" v-bind:score="score" v-bind:type="repoData.type"
                    v-bind:repository="repoData.repository" v-bind:date="repoData.date" v-bind:points="repoData.points">

            </result>
            </tbody>
        </table>

    </div>
</template>

<script>
    import Result from "./result";

    export default {
        components: {Result},
        data() {
            return {
                repoArray: [],
                score: 'PLease Wait...',
            }
        },
        mounted() {
            console.log("Component mounted.");
            axios.get('/score').then((res) => {
                console.log(res.data);
                this.repoArray = res.data.data;
                this.score = res.data.score;
            });
        }
    };
</script>
<style scoped>
    #score {
        margin: 5% auto;
        width: fit-content;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin: 10% auto;

    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
