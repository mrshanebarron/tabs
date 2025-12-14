import Tabs from './Tabs.vue';
import TabPanel from './TabPanel.vue';

export { Tabs, TabPanel };

export default {
  install(app) {
    app.component('SbTabs', Tabs);
    app.component('SbTabPanel', TabPanel);
  }
};
