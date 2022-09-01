<!--
  Matomo - free/libre analytics platform

  @link https://matomo.org
  @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
-->

<template>
  <ContentBlock
    :content-title="translate('TasksTimetable_ScheduledTasks')"
  >
    <p v-html="$sanitize(introduction)"></p>

    <table v-content-table>
      <thead>
        <tr>
          <th>{{ translate('General_Name') }}</th>
          <th>{{ translate('General_Date') }} in UTC timezone</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(task, index) in tasks" :key="index">
          <td>{{ task.name}}</td>
          <td>{{ task.executionDate }}<br />
            <span style="color:#999">
              (in <span v-html="$sanitize(task.ts_difference)"></span>)
            </span>
          </td>
        </tr>
        <tr v-if="!tasks.length">
          <td colspan="2"><br/>{{ translate('TasksTimetable_NothingScheduled') }}<br/><br/></td>
        </tr>
      </tbody>
    </table>
  </ContentBlock>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { ContentBlock, ContentTable, translate } from 'CoreHome';

export default defineComponent({
  props: {
    currentTime: {
      type: String,
      required: true,
    },
    tasks: {
      type: Array,
      required: true,
    },
  },
  components: {
    ContentBlock,
  },
  directives: {
    ContentTable,
  },
  computed: {
    introduction() {
      return translate(
        'TasksTimetable_Introduction',
        `<span class="server-time">${this.currentTime}</span>`,
      );
    },
  },
});
</script>
