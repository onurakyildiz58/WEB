using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebAjaxCRUD.Models
{
    public class PersonViewModel
    {
        public int personID { get; set; }
        public string personName { get; set; }
        public string personSurname { get; set; }
        public string personMail { get; set; }
        public Nullable<int> personDep { get; set; }
        public Nullable<bool> personeDelete { get; set; }
        public Nullable<int> personNumber { get; set; }

        public string DepartmentName{ get; set; }
    }
}