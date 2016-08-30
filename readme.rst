###################
What is Claims Manager
###################

Claims Manager application to
be used from various frontend applications (Native Mobile / Web). It has to be a multitenant system,
meaning multiple teams can use the same application.

*******************
Database Information
*******************
Import claim_mgmt.sql in your mysql database.

For more info related please refer "clamis_mgmt_db_design.png".

**************************
Features
**************************

1. This application will be used by multiple teams in a company
a. Each team will have two types of users. Finance Manager(FM), Employee
b. Contents & Claims of a team can be accessed only by the members of the team.
c. A member can belong to multiple teams.
2. Team and User Management
a. The application will have a provision for creating / editing teams, users
b. A team can have only one FM and multiple employee
c. Role of an user is specific to the team. i.e.) A Finance Manager in a team can be
Employee in another team.
3. Claims Management
a. An employee in a team can add claims to the system which will be sent for approval.
During adding new claims the employee has to provide
1. Date
2. Description of the claim
3. Invoice copy upload (Image formats, DOC, XLS, PDF)
b. The claim can be edited only if it is in new status.
c. Following is the life cycle of an Claim.
1. New / Draft
2. Sent to Approval
3. Approved / Rejected
4. Settled
d. The Finance Manager can review the claim and approve / reject it.
e. There should be provision for the manager to view the list of Waiting approval
approved, settled claims with the sum for each status.
f. Manager cannot see the claim which are in new / draft version
g. Employee can see the Claims added by him / her only.


