<script setup>

</script>

<template>
    <form>
<!--        <br><pre>centered_picture_blocks table</pre><br>-->

        <label for="subheading">Subheading:</label><br>
        <input id="subheading" type="text" name="subheading" /><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" name="heading" required /><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" name="paragraph" required /><br>

        <label for="picture">Picture URL:</label><br>
        <input id="picture" type="url" name="picture" required /><br>

        <label for="picture_size">Picture size:</label><br>
        <input id="picture_size" type="number" name="picture_size" /><br>

        <label for="alt_text">Alt:</label><br>
        <input id="alt_text" type="text" name="alt_text" /><br>



        <label for="block_index">Block index:</label><br>
        <input id="block_index" type="number" name="block_index" /><br>
    </form>
</template>

<style scoped>

</style>
