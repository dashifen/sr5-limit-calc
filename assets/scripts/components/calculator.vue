<template>
  <p>Fill in the attributes specified by the placeholders in the fields
    below to calculate your limits.  All fractional limits are rounded up.</p>

  <table id="limit-calculator">
    <thead>
    <tr>
      <th>Type</th>
      <th colspan="3">Attributes</th>
      <th>Limit</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th>Physical</th>
      <td><input type="number" placeholder="STR" v-model="strength"></td>
      <td><input type="number" placeholder="BOD" v-model="body"></td>
      <td><input type="number" placeholder="REA" v-model="reaction"></td>
      <td v-text="limits.physical"></td>
    </tr>
    <tr>
      <th>Mental</th>
      <td><input type="number" placeholder="LOG" v-model="logic"></td>
      <td><input type="number" placeholder="INT" v-model="intuition"></td>
      <td><input type="number" placeholder="WIL" v-model="willpower"></td>
      <td v-text="limits.mental"></td>
    </tr>
    <tr>
      <th>Social</th>
      <td><input type="number" placeholder="CHA" v-model="charisma"></td>
      <td><input type="number" placeholder="WIL" v-model="willpower"></td>
      <td><input type="number" placeholder="ESS" v-model="essence"></td>
      <td v-text="limits.social"></td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "limit-calculator",
  data() {
    return {
      body: null,
      reaction: null,
      strength: null,
      willpower: null,
      logic: null,
      intuition: null,
      charisma: null,
      essence: null,
    }
  },
  computed: {
    limits() {
      return {
        physical: Math.ceil((Number(this.strength) * 2 + Number(this.body) + Number(this.reaction)) / 3),
        mental: Math.ceil((Number(this.logic) * 2 + Number(this.intuition) + Number(this.willpower)) / 3),
        social: Math.ceil((Number(this.charisma) * 2 + Number(this.willpower) + Number(this.essence)) / 3),
      }
    }
  }
};
</script>
