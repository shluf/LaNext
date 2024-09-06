'use client'
import { useUser } from "@/hooks/users";
import { columns } from "./columns";
import { DataTable } from "./data-table";

export default function DemoPage() {
    const { users, isLoading, isError } = useUser();

    if (isLoading) return <div>Loading...</div>;
    if (isError) return <div>Error loading users</div>;


    const formattedData = users.map(user => ({
        id: user.id,
        role: user.role,
        date_created: user.date_created,
        email: user.email,
    }));

    return (
        <div className="container mx-auto py-10">
            <DataTable columns={columns} data={formattedData} />
        </div>
    );
}
