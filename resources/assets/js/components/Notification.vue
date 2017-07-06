<template>
    <div class="notification">
        <h1> {{message}} </h1>
        <p><center><strong> {{headline}} </strong></center></p>
        <div v-html="msg"></div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                message: 'Hello World',
                msg: `<p>When it comes to cybersecurity issues in a company, most of the managers evade the responsibility and plead ignorance about the threat for cyber-attacks. This in turn leads to a weak organization in terms of security and makes it prone to cyber-attacks at any time. The managers tend to put their total concern on financial and legal issues affecting the company, forgetting the most important and crucial bit which is cyber security. </p>

				<p>They consider cyber security issues to be too complex to make judgements about. In this digital era, a greater percentage of businesses have transformed their operations and transactions to be online. This necessitates the managers to take the mantle and spearhead the tough journey towards conquering the cyber-attacks/threats directed to their companies. The managers should therefore take full responsibility concerning the cybersecurity issue.</p>

				<p>I am delighted to see that the management at Cytonn Investments is taking responsibility concerning cyber security. The management is concerned and is trying the very best to enlighten the employees about the issue too. For instance, the KnowBe4 training and tests have played a great role in enlightening the employees and it has also portrayed a great image of the company’s management in matters of cyber security. Therefore, setting up such training forums will bring a great positive impact to the company.<p/>`,

                headline: "UK cyber chief says directors are devolving responsibility for hacks",
                topics: "",
                email: "",
                username: "",
                password:"",
                user: {},
            }
        }
    }
</script>

<style lang="scss">
    .notification {
        background: #e3e3e3;
    }
</style>