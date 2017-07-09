<template>
    <div class="notification">
        <div v-html="msg"></div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                msg: `<p>
                    1. Authorized users sign in to the system and perform tasks according to their access levels
                    <br>2. An authorized user creates an institution and contact person from that institution
                    <br>3. A project manager assigns a Cytonn employee to a specific institution
                    <br>4. The employee assigned to an institution converses with the contact person and records the interactions. The interactions can be either through calls, emails, or meetings
                    <br>5. Follow-up items arising after an interaction are tracked to be used in forthcoming interactions.
                    <br>6. The employee assigned an institution schedules an interaction with the contact person. Upon scheduling an interaction, a reminder will be sent to remind the employee of the scheduled interaction
                    <br>7. The system checks for future upcoming interactions and sends a reminder email 12 hours prior to the interaction
                    <br>8. A user changes the status of an institution in regards to a certain project such as: interested, not-interested or in-talks
                    <br>9. After an agreement, a user creates a deal, specifying the ratios and uploads the agreement document
                    <br>10. The system then sends an email to both parties, notifying them about the deal
                    <br>11. Finally, the system generates reports of institutions contacted and their stand in relation to funding the project.

                      <p/>`,
            }
        }
    }
</script>

<style lang="scss">
    .notification {
        background: linen;
    }
</style>

