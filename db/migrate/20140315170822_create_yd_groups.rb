class CreateYdGroups < ActiveRecord::Migration
  def up
    create_table(:yd_groups) do |t| 
      t.string :name 
      t.integer :status, :default => 0
      t.integer :owner_id
      t.text :description
      t.datetime :created_at
      t.datetime :updated_at
    end
  end

  def down
    drop_table(:yd_groups)
  end
end
