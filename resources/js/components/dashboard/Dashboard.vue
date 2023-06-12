<template>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="card" style="background:rgb(30, 177, 20);color:rgb(67, 22, 22);
              border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Registered Users<br /> (Today)</p>
                        <h5 class="font-weight-bolder">
                          {{ dashboard.user_today }}
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                  <div class="card" style="background:rgb(77, 166, 224);color:rgb(67, 22, 22);
                  border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Registered Users This (Week)</p>
                            <h5 class="font-weight-bolder">
                              {{ dashboard.user_weekly }}
                            </h5>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                          <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card" style="background:rgb(88, 78, 228);color:rgb(67, 22, 22);
                      border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-8">
                              <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Registered Users This (Month)</p>
                                <h5 class="font-weight-bolder">
                                  {{ dashboard.user_monthly }}
                                </h5>
                              </div>
                            </div>
                            <div class="col-4 text-end">
                              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                     <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top:50px">
                          <div class="card" style="background:rgb(235, 85, 227);color:rgb(67, 22, 22);
                          border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-8">
                                  <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Applications <br/>(Today)</p>
                                    <h5 class="font-weight-bolder">
                                      {{ dashboard.applicant_today }}
                                    </h5>
                                  </div>
                                </div>
                                <div class="col-4 text-end">
                                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top:50px">
                              <div class="card" style="background:rgb(201, 168, 51);color:rgb(67, 22, 22);
                              border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="col-8">
                                      <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Applications This <br />(Week)</p>
                                        <h5 class="font-weight-bolder">
                                          {{ dashboard.applicant_weekly}}
                                        </h5>
                                      </div>
                                    </div>
                                    <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top:50px">
                                  <div class="card" style="background:rgb(236, 79, 79);color:rgb(67, 22, 22);
                                  border-radius:20px;color:rgb(247, 242, 242);font-weight:bold">
                                    <div class="card-body p-3">
                                      <div class="row">
                                        <div class="col-8">
                                          <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Applications This <br/>(Month)</p>
                                            <h5 class="font-weight-bolder">
                                              {{ dashboard.applicant_monthly }}
                                            </h5>
                                          </div>
                                        </div>
                                        <div class="col-4 text-end">
                                          <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
    </div>  
    
</template>

<script>
export default {
    name: "dashboard",
    data() {
        return {
            dashboard: {
                user_today: 0,
                user_weekly: 0,
                user_monthly: 0,
                applicant_today: 0,
                applicant_weekly: 0,
                applicant_monthly: 0
            }
        }
    },
    mounted() {
        this.getDashboardData();
    },
    methods: {
        async getDashboardData() {
            await this.axios.get('/api/dashboard/data').then(response => {
                const {
                    user_today, 
                    user_weekly, 
                    user_monthly, 
                    applicant_today, 
                    applicant_weekly, 
                    applicant_monthly
                } = response.data.data;

                this.dashboard.user_today = user_today;
                this.dashboard.user_weekly = user_weekly;
                this.dashboard.user_monthly = user_monthly;
                this.dashboard.applicant_today = applicant_today;
                this.dashboard.applicant_weekly = applicant_weekly;
                this.dashboard.applicant_monthly = applicant_monthly;
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>


