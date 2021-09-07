<template>
        <tr>
            <td>
                {{type}}
            </td>
            <td>
                {{repository}}
            </td>
            <td>
                {{date}}
            </td>
            <td>
                {{points}}
            </td>

        </tr>
</template>

<script>
    export default {
        name: "result",
        props: ['score', 'repoArray', 'type', 'repository', 'date', 'points']
    }
</script>


