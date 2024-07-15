<template>
    <div>
        <h1>Список заявок</h1>
        <LeadsList />
    </div>
</template>

<script>
import LeadsList from '@/components/LeadsList.vue';

export default {
    name: 'LeadsPage',
    components: {
        LeadsList
    }
}
</script>