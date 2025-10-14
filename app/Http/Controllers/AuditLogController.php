<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    // Display all audit logs (admin only)
    public function index()
    {
        $auditLogs = AuditLog::with('user')->latest()->get(); // show latest first
        return view('audit_logs.index', compact('auditLogs'));
    }

    // Delete an audit log (optional)
    public function destroy($id)
    {
        $log = AuditLog::findOrFail($id);
        $log->delete();

        return redirect()->route('audit_logs.index')
                         ->with('success', 'Audit log deleted successfully.');
    }
}
