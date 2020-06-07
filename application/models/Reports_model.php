<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 06:25
 */
class Reports_model extends CI_Model
{
    public function getLandRegistration()
    {
        $a = $this->db->get('tbl_land_reg');
        return $a->result_array();
    }

    public function getNameById($table_name,$id,$param)
    {
        $q = $this->db->get_where($table_name,array($id=>$param));
        return $q->row();
    }

    public function getLandClass()
    {
        $q = $this->db->get('lib_land_class');
        return $q->result();
    }

    public function getApproveClaims($landClass)
    {
        $sql = '
            select
            b.status_name,
            IF((select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.') is null,0,(select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.')) as total_fbs,
            IF((select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.') IS NULL,0,(select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.')) as AREA,
            IF((select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.') IS NULL,0,(select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.')) as amount,
            IF((select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.') IS NULL,0,(select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.')) AS CASH,
            IF((select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.') is null,0,(select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.')) as BOND
            from
            lib_status as b
        ';
        $q = $this->db->query($sql);
        return $q->result();
    }

    public function getApproveClaimsByYearMonth($landClass,$year,$month)
    {
        $sql = '
            select
            b.status_name,
            IF((select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.') is null,0,(select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.')) as total_fbs,
            IF((select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.') IS NULL,0,(select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.')) as AREA,
            IF((select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.') IS NULL,0,(select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.')) as amount,
            IF((select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.') IS NULL,0,(select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.')) AS CASH,
            IF((select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.') is null,0,(select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.' and month(date_last_ammended) = '.$month.')) as BOND
            from
            lib_status as b
        ';
        $q = $this->db->query($sql);
        return $q->result();
    }

    public function getApproveClaimsByYear($landClass,$year)
    {
        $sql = '
            select
            b.status_name,
            IF((select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.') is null,0,(select SUM(a.no_fbs) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.')) as total_fbs,
            IF((select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.') IS NULL,0,(select SUM(a.area_acqrd) from tbl_land_reg as a where a.status_id=B.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.')) as AREA,
            IF((select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.') IS NULL,0,(select SUM(a.less_rel_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.')) as amount,
            IF((select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.') IS NULL,0,(select SUM(a.end_bal_total) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.')) AS CASH,
            IF((select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.') is null,0,(select SUM(a.end_bal_bond) from tbl_land_reg as a where a.status_id=b.status_id and a.land_class_id='.$landClass.' and year(date_last_ammended) = '.$year.')) as BOND
            from
            lib_status as b
        ';
        $q = $this->db->query($sql);
        return $q->result();
    }

    public function report1()
    {
        $sql = '
            select
            b.prov_name,
            b.prov_id,
            (select COUNT(*) from tbl_land_reg as a where a.status_id=2 and a.prov_id=b.prov_id) AS fully_paid,
            (select COUNT(*) from tbl_land_reg as a where a.status_id=3 and a.prov_id=b.prov_id) AS partial_paid,
            (select COUNT(*) from tbl_land_reg as a where a.status_id=4 and a.prov_id=b.prov_id) AS approved,
            (select COUNT(*) from tbl_land_reg as a where a.status_id=6 and a.prov_id=b.prov_id) AS paid_under_ao2,
            (select COUNT(*) from tbl_land_reg as a where a.status_id=7 and a.prov_id=b.prov_id) AS pending_claim
            from
            lib_provinces as b
            where region_id=5
        ';
        $q = $this->db->query($sql);
        return $q->result();
    }
}