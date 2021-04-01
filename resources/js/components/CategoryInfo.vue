<template>
    <tr>
        <td>{{ category.name}}</td>
        <td>
            <div class="btn-group" role="group">
                <button
                    class="btn btn-primary mr-1 rounded"
                    @click="$emit('edit', category)"
                >
                    Edit
                </button>
                <button
                    class="btn btn-danger rounded"
                    @click="$emit('delete', category.id)"
                >
                    Remove
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: ["category"]
};
</script>
